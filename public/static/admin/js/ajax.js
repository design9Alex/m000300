var $ajaxBody = $("body");

/**
 * Switch form data language
 */
$ajaxBody.on('click', '.form-local-option', function() {
    var $this = $(this);
    $.ajax({
        url: $this.attr('data-url'), type: 'PUT', data: {language: $this.attr('data-code')},
        success: function() { window.location.reload(true); }
    });
});

/**
 * Switch form data language active
 */
$ajaxBody.on('click', '#form-local-switch', function() {
    var $this = $(this);
    var switchTo = $this.attr('data-status') === '1' ? 0 : 1;
    $.ajax({
        url: $this.attr('data-url'), type: 'PATCH', data: {id: $this.attr('data-id'), switchTo: switchTo},
        success: function() {
            $this.attr('data-status', switchTo);
            if (switchTo === 1) {
                $this.text($this.attr('data-text-enable'));
                $this.removeClass('badge-secondary').addClass('badge-danger');
            } else {
                $this.text($this.attr('data-text-disable'));
                $this.removeClass('badge-danger').addClass('badge-secondary');
            }
        },
        error: function () {
            swal('Switch failed.', 'Switching language status get failed.', 'error');
        }
    });
});

/**
 * Datatable search field events
 */
$ajaxBody
    .on('change', '#sch_column', function() { $(".datatables").DataTable().draw(); })
    .on('change', 'select.sch_select', function() { $(".datatables").DataTable().draw(); })
    .on('change search', '#sch_keyword', function() { $(".datatables").DataTable().draw(); });

/**
 * Datatable bind event actions
 * - switch status
 * - change sort (after change number call update sort function)
 * - delete row
 */
$('#tableList')
    .on('click', '.badge-switch', function(e) {
        e.preventDefault();

        var $this = $(this);
        var url = $this.attr('data-url'),
            status = parseInt($this.attr('data-value')),
            id = $this.attr('data-id'),
            column = $this.attr('data-column');
        var switchTo = status === 1 ? 0 : 1;

        $.ajax({
            url: url, type: 'PATCH', dataType:'json',
            data: {id:id,column:column,oriValue:status,switchTo:switchTo},
            success:function(result) {
                $this.attr('data-value', switchTo);
                if (result.hasOwnProperty('oriClass')) $this.removeClass(result.oriClass);
                if (result.hasOwnProperty('newClass')) $this.addClass(result.newClass);
            },
            complete:function(){$('#tableList').DataTable().draw(false);}
        });
        return false;
    })
    .on('click', '.updateSort', function(e) {
        e.preventDefault();

        var $this = $(this);
        var id = $this.attr('data-guid'), column = $this.attr('data-column');
        var $input = $('#' + column + '_' + id);
        var index = parseInt($input.val());

        switch($this.attr('data-act')) {
            case 'up':
                $input.val(index - 1); break;
            case 'down':
                $input.val(index + 1); break;
        }
        $input.change();
        return false;
    })
    .on('click', '.delItem', function(e) {
        e.preventDefault();

        var $thisForm = $(this).parents('form');
        var trashItem = $(this).hasClass('trashItem');

        swal({
            title: getLanguage(sweetAlertLanguage, trashItem ? 'single_trash.title' : 'single_delete.title'),
            text: getLanguage(sweetAlertLanguage, trashItem ? 'single_trash.text' : 'single_delete.text'),
            type: "info",
            cancelButtonText: getLanguage(sweetAlertLanguage, trashItem ? 'single_trash.cancelButtonText' : 'single_delete.cancelButtonText'),
            confirmButtonText: getLanguage(sweetAlertLanguage, trashItem ? 'single_trash.confirmButtonText' : 'single_delete.confirmButtonText'),
            confirmButtonClass: "btn-danger",
            showCancelButton: true,
            closeOnConfirm: false
        }, function(result) {
            if(result) $thisForm.submit();
        });
    });



/**
 * SystemDraft 草稿
 */
$('.draft-area').each(function () {
    var $draftArea = $(this);
    var $draftMenu = $('.draft-menu', $draftArea);
    var formId = $draftArea.attr('data-form-id');
    var url = $('.draft-url', $draftArea).val();
    var previewUrl = $('.draft-preview-url', $draftArea).val();
    var autoSaver;

    var getDrafts = function () {
        $.post($('.draft-get-url', $draftArea).val(), {'url': url}, function(response) {
            $('div.dropdown-item, div.dropdown-divider', $draftMenu).remove();
            if (response.data.length > 0) {
                $draftMenu.append('<div class="dropdown-divider"></div>');
                for (var row of response.data) {
                    if (row.hasOwnProperty('id') && row.hasOwnProperty('title')) {
                        $draftMenu.append(
                            '<div class="dropdown-item d-flex justify-content-between" style="cursor: default" title="' + row.time + '">' +
                            '<div class="mr-3"><i class="icon-time mr-2 text-muted"></i>' + row.title + '</div>' +
                            '<div>' +
                            (row.title === row.time ? '<button class="btn btn-outline-default btn-sm destroy-btn" type="button" data-id="' + row.id + '" title="Remove"><i class="icon-bin"></i></button>' : '') +
                            '<a class="btn btn-outline-default btn-sm" href="' + url + '?draft=' + row.id + '" title="Load"><i class="icon-pencil"></i></a>' +
                            (previewUrl === '' ? '' : '<a class="btn btn-outline-default btn-sm" href="' + previewUrl + '?draft=' + row.id + '" target="_blank" title="Preview"><i class="icon-eye"></i></a>') +
                            '</div></div>'
                        );
                    }
                }
            }
        }, 'json');
    };

    var storeDraft = function (type = 'auto') {
        if (typeof CKEDITOR !== 'undefined') {
            if (Object.keys(CKEDITOR.instances).length > 0) {
                for (var k in CKEDITOR.instances) {
                    if (CKEDITOR.instances.hasOwnProperty(k)) {
                        CKEDITOR.instances[k].updateElement();
                    }
                }
            }
        }

        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }

        $.post($('.draft-store-url', $draftArea).val(),
            {'type': type, 'url': url, 'attributes': $('#' + formId).serializeArray()},
            function(response) {
                getDrafts(formId, url);
                if (type === 'manual') {
                    swal(response.msg, 'success');
                }
            }, 'json')
            .fail(function(response) {
                if (type === 'manual') {
                    swal(response.msg, 'error');
                }
            });
    };

    $draftArea.on('click', '.store-btn', function () {
        storeDraft('manual');
    });

    $draftArea.on('click', '.destroy-btn', function () {
        $.post($('.draft-destroy-url', $draftArea).val(), {'id': $(this).attr('data-id')},
            function() {
                getDrafts(formId, url);
            }, 'json');
    });

    $('#' + formId).on('change', function () {
        clearTimeout(autoSaver);
        autoSaver = setTimeout(function () { storeDraft('auto'); }, 1500);
    });

    getDrafts();
});

/**
 * Datatable single row update sort
 * @param {string} column
 * @param {*} id
 */
function updateSort(column, id) {
    var $input = $('#' + column + '_' + id);
    var url = $input.attr('data-url'), index = parseInt($input.val());
    if(index < 0) index = 0;

    $.ajax({
        url: url, type: 'PATCH', dataType:'json',
        data: {id:id,column:column,index:index},
        success:function(){$('#tableList').DataTable().draw(false);},
        error:function(response){console.log(response);}
    });
}

/**
 * Datatable batch delete rows
 * @param {string} url
 * @param {string} column
 * @param {*} status
 */
function multiSwitch(url, column, status) {
    var checkedSet = [];
    $('#tableList tbody .checkboxes input').each(function() {
        if ($(this).prop('checked')) checkedSet.push($(this).val());
    });
    if (checkedSet.length > 0) {
        swal({
            title: getLanguage(sweetAlertLanguage, 'multi_switch.title'),
            text: getLanguage(sweetAlertLanguage, 'multi_switch.text'),
            type: "info",
            showCancelButton: true,
            cancelButtonText: getLanguage(sweetAlertLanguage, 'multi_switch.cancelButtonText'),
            confirmButtonText: getLanguage(sweetAlertLanguage, 'multi_switch.confirmButtonText'),
            confirmButtonClass: "btn-danger",
            closeOnConfirm: false
        }, function(result) {
            if(result) {
                $.ajax({
                    url: url, type: 'PATCH', dataType:'json',
                    data: {selected:checkedSet,column:column,switchTo:status},
                    success:function(result) {
                        $('#tableList').DataTable().draw(false);
                        $('#tableList .group-checkable').prop('checked', false);
                        swal.close();
                    },
                    error:function(response) {
                        swal(getLanguage(sweetAlertLanguage, 'multi_switch.error_title'),
                            getLanguage(sweetAlertLanguage, 'multi_switch.error_text'),
                            'error');
                    }
                });
            }
        });
    } else {
        swal(getLanguage(sweetAlertLanguage, 'selected_none.title'),
            getLanguage(sweetAlertLanguage, 'selected_none.text'),
            'error');
    }
}

/**
 * Datatable batch delete rows
 * @param {string} url
 * @param {boolean} trashcan
 */
function multiDelete(url, trashcan = false) {
    var checkedSet = [];
    $('#tableList tbody .checkboxes input').each(function() {
        if ($(this).prop('checked')) checkedSet.push($(this).val());
    });
    if (checkedSet.length > 0) {
        swal({
            title: getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.title' : 'multi_delete.title'),
            text: getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.text' : 'multi_delete.text'),
            type: "info",
            showCancelButton: true,
            cancelButtonText: getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.cancelButtonText' : 'multi_delete.cancelButtonText'),
            confirmButtonText: getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.confirmButtonText' : 'multi_delete.confirmButtonText'),
            confirmButtonClass: "btn-danger",
            closeOnConfirm: false
        }, function(result) {
            if(result) {
                $.ajax({
                    url: url, type: 'DELETE', dataType:'json',
                    data: {selected:checkedSet},
                    success:function(result){
                        $('#tableList').DataTable().draw(false);
                        $('#tableList .group-checkable').prop('checked', false);
                        swal.close();
                    },
                    error:function(response){
                        swal(getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.error_title' : 'multi_delete.error_title'),
                            getLanguage(sweetAlertLanguage, trashcan ? 'multi_trash.error_text' : 'multi_delete.error_text'),
                            'error');
                    }
                });
            }
        });
    } else {
        swal(getLanguage(sweetAlertLanguage, 'selected_none.title'),
            getLanguage(sweetAlertLanguage, 'selected_none.text'),
            'error');
    }
}

/**
 * Form field Address.
 *
 * @param {string} id
 * @param {Object} urls
 * @param {Object} defaults
 */
function initAddress(id, urls, defaults) {
    var $country = $('#' + id + '-country');
    $country.on('change', function () {
        var $countrySelect = $(this);
        var $stateSelect = $('#' + id + '-state');
        var $emptyOption = $('option:first-child', $stateSelect);
        $stateSelect.empty().append($emptyOption);
        if ($countrySelect.val() === '' || !urls.hasOwnProperty('states')) {
            $stateSelect.selectpicker('refresh');
            $stateSelect.change();
        } else {
            var url = urls.states.replace(/\/id\//, '/' + $countrySelect.val() + '/');
            $.get(url, function (response) {
                for (var item of response) {
                    if (item.hasOwnProperty('id') && item.hasOwnProperty('name')) {
                        $stateSelect.append('<option value="' + item.id + '">' + item.name + '</option>');
                    }
                }
                $stateSelect.selectpicker('refresh');
                if (defaults.state !== '' && defaults.country === $countrySelect.val()) {
                    $stateSelect.selectpicker('val', defaults.state).change();
                } else {
                    $stateSelect.change();
                }
            });
        }
    });
    $('#' + id + '-state').on('change', function () {
        var $stateSelect = $(this);
        var $countySelect = $('#' + id + '-county');
        var $emptyOption = $('option:first-child', $countySelect);
        $countySelect.empty().append($emptyOption);
        if ($stateSelect.val() === '' || !urls.hasOwnProperty('counties')) {
            $countySelect.selectpicker('refresh');
            $countySelect.change();
        } else {
            var url = urls.counties.replace(/\/id\//, '/' + $stateSelect.val() + '/');
            $.get(url, function (response) {
                for (var item of response) {
                    if (item.hasOwnProperty('id') && item.hasOwnProperty('name')) {
                        $countySelect.append('<option value="' + item.id + '">' + item.name + '</option>');
                    }
                }
                $countySelect.selectpicker('refresh');
                if (defaults.county !== '' && defaults.state === $stateSelect.val()) {
                    $countySelect.selectpicker('val', defaults.county).change();
                } else {
                    $countySelect.change();
                }
            });
        }
    });
    $('#' + id + '-county').on('change', function () {
        var $countySelect = $(this);
        var $citySelect = $('#' + id + '-city');
        var $emptyOption = $('option:first-child', $citySelect);
        $citySelect.empty().append($emptyOption);
        if ($countySelect.val() === '' || !urls.hasOwnProperty('cities')) {
            $citySelect.selectpicker('refresh');
            $citySelect.change();
        } else {
            var url = urls.cities.replace(/\/id\//, '/' + $countySelect.val() + '/');
            $.get(url, function (response) {
                for (var item of response) {
                    if (item.hasOwnProperty('id') && item.hasOwnProperty('zip') && item.hasOwnProperty('name')) {
                        $citySelect.append('<option value="' + item.id + '" data-zip="' + item.zip + '">' + item.name + '</option>');
                    }
                }
                $citySelect.selectpicker('refresh');
                if (defaults.city !== '' && defaults.county === $countySelect.val()) {
                    $citySelect.selectpicker('val', defaults.city).change();
                } else {
                    $citySelect.change();
                }
            });
        }
    });
    $('#' + id + '-city').on('change', function () {
        var $citySelect = $(this);
        var $zipText = $('#' + id + '-zip');
        if ($citySelect.val() !== '') {
            $zipText.val($('option:selected', $citySelect).attr('data-zip'));
        } else {
            $zipText.val('');
        }
    });

    if (defaults.country !== '') {
        $country.selectpicker('val', defaults.country).change();
    }
}
