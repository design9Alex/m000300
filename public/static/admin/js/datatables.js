/**
 * Datatable base defined
 */
$.extend($.fn.dataTable.defaults, {
    processing: true, serverSide: true, searching: false, responsive: true, bAutoWidth: false, tabIndex: -1,
    dom: 'rt<"row mt-3"<"col-md-6 text-center text-md-left"li><"col-md-6 text-center text-md-right"p>>',
    ajax: {type: 'POST'}, language: datatableLanguage,
    pageLength: 20, lengthMenu: [[10, 20, 50, 100, 150, -1], [10, 20, 50, 100, 150, 'All']],
    columnDefs: [{targets: 'nosort', orderable: false}],
});

$(function() {
    /**
     * Datatable - Select all
     */
    $('.datatables .group-checkable').each(function() {
        var $checkbox = $(this);
        $checkbox.change(function() {
            $($checkbox.attr('data-set')).each(function() {
                if ($checkbox.is(':checked')) {
                    $(this).prop('checked', !0); $(this).parents('tr').addClass('active');
                } else {
                    $(this).prop('checked', !1); $(this).parents('tr').removeClass('active');
                }
            })
        });
    });
    /**
     * Datatable - Select single
     */
    $('.datatables').on('change', 'tbody tr .checkboxes input[type=checkbox]', function () {
        $(this).parents('tr').toggleClass('active');
        if($(this).prop('checked') === false) {
            $('.datatables .group-checkable').prop('checked', false);
        }
    });
});

/**
 * 綁定 DataTable 的 init 事件。必須在建立 DataTable 實體前綁定。
 * @param  {string} tableId
 * @param  {string} row is number of start row.
 */
function datatableBindPage (tableId, row)
{
    $('#' + tableId).on('init.dt', function (e, settings) {
        var api = new $.fn.dataTable.Api( settings );
        var start = parseInt(row);
        var length = (typeof settings.json.input === 'undefined' || settings.json.input === null) ? 0 : parseInt(settings.json.input.length);
        var page = start === 0 || length === 0 ? 0 : Math.floor(start / length);
        setTimeout(function() { api.page(page).draw('page'); }, 100);
    });
}

/**
 * 取得網址參數並設定 DataTable 相關預設值。
 * @param  {array} columns
 * @param  {array} filters
 * @param  {object} equals
 * @param  {array} orders
 * @param  {string} ajaxSrc
 * @param  {object} storage
 * @param  {string} tableId
 * @return {object}
 */
function datatableInit(columns = [], filters = [], equals = {}, orders = [], ajaxSrc = '', storage = {}, tableId = 'tableList')
{
    var paramSet = location.search.substring(1).split('&'), params = {};
    for (var paramItem of paramSet) {
        if (paramItem !== '') {
            var pair = paramItem.split('=');
            if (pair[0] !== '') params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
        }
    }

    if (params.hasOwnProperty('filters') && parseInt(params.filters) === 1 && Object.keys(storage).length > 0) {

        if (storage.hasOwnProperty('filter')) {
            var storageFilter = storage.filter;
            for (var filterCode of filters) {
                if (storageFilter.hasOwnProperty(filterCode)) {
                    $('#sch_keyword').val(storageFilter[filterCode]);
                    if (storageFilter[filterCode] !== null && storageFilter[filterCode] !== '') {
                        $('#sch_column').val(filterCode);
                    }
                }
            }
        }

        if (storage.hasOwnProperty('equal')) {
            var storageEqual = storage.equal;
            for (var equalCode in equals) {
                if (equals.hasOwnProperty(equalCode) && storageEqual.hasOwnProperty(equalCode)) {
                    $('#' + equals[equalCode]).val(storageEqual[equalCode]).selectpicker('render');
                }
            }
        }

        if (storage.hasOwnProperty('start')) {
            datatableBindPage(tableId, storage.start);
        }

        if (storage.hasOwnProperty('order')) {
            orders = [];
            for (var order of storage['order']) {
                if (order.hasOwnProperty('column') && order.hasOwnProperty('dir')) {
                    orders.push([order.column, order.dir]);
                }
            }
        }

    }

    return $('#' + tableId).DataTable({
        language: datatableLanguage,
        pageLength: params.hasOwnProperty('length') ? params.length : 20,
        ajax: {
            url: ajaxSrc,
            data: function (d) {
                if (filters.length > 0) {
                    var searchKeyword = $('#sch_keyword').val();
                    var searchColumn = $('#sch_column').val();

                    d.filter = {};
                    for (var filterCode of filters) {
                        d.filter[filterCode] = searchKeyword;
                    }

                    if (searchColumn !== '') {
                        for (var column in d.filter) {
                            if (column !== searchColumn && d.filter.hasOwnProperty(column)) {
                                d.filter[column] = '';
                            }
                        }
                    }
                }

                if (Object.keys(equals).length > 0) {
                    d.equal = {};
                    for (var equalCode in equals) {
                        if (equals.hasOwnProperty(equalCode)) {
                            d.equal[equalCode] = $('#' + equals[equalCode]).val();
                        }
                    }
                }
            }
        },
        columns: columns,
        order: orders
    });
}
