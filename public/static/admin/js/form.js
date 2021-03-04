$(document).ready(function () {

    /*--------------------------------------------
     Form Bootstrap-Select.js  下拉搜尋
     ---------------------------------------------*/
    if ($.fn.hasOwnProperty('selectpicker')) {
      $.fn.selectpicker.defaults = {
        multipleSeparator: ', ',
        style:'btn-outline-secondary',
        iconBase: '',
        tickIcon: 'icon-checkmark2',
      };
    }
    $('select.bs-select').each(function () {
      $(this)
        .on('rendered.bs.select', function () {
          if ($(this).siblings('.dropdown-menu').find('.bs-searchbox').length > 0) {
            $(this).siblings('.dropdown-menu').find('.bs-searchbox input.form-control').addClass('ignore-valid');
          }
        })
        .selectpicker();
    });

    /*--------------------------------------------
     Form select2.js  下拉搜尋
     ---------------------------------------------*/
    /** 基本下拉 **/
    $('.seclet2').each(function () {
        $(this).select2();
    });
    /** 無搜尋匡 **/
    $('.seclet2-hide-search').each(function () {
        $(this).select2({
            minimumResultsForSearch: 1 / 0
        });
    });
    /** 可清除選取 **/
    $('.seclet2-placeholder').each(function () {
        $(this).select2({
            placeholder: "Select a state",
            allowClear: !0
        });
    });
    /** 限定數量選取 **/
    $('.seclet2-length').each(function () {
        var $num = $(this).attr("size");
        var $text = $(this).attr("title");
        $(this).select2({
            maximumSelectionLength: $num,
            placeholder: $text + $num
        });
    });
    $('.select2-size-lg').each(function () {
        $(this).select2({
            containerCssClass: "select-lg"
        });
    });
    $('.select2-size-sm').each(function () {
        $(this).select2({
            containerCssClass: "select-sm"
        });
    });

    /*--------------------------------------------
     Form multiselect.js  左右複選
     --------------------------------------------*/
    $('.multiSelect').each(function () {
        $(this).multiSelect({
            selectableOptgroup: true,
            selectableHeader: "<input type='text' class='form-control search-input ignore-valid' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input ignore-valid' autocomplete='off' placeholder='search...'>",
            afterInit: function () {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';
                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });
                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function (e) {
                        if (e.which === 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function () {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function () {
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    });
    $('.select-all').click(function () {
        var $thisSelect = $(this).parent().prev().prev();
        $thisSelect.multiSelect('select_all');
        return false;
    });
    $('.deselect-all').click(function () {
        var $thisSelect = $(this).parent().prev().prev();
        $thisSelect.multiSelect('deselect_all');
        return false;
    });

    /*--------------------------------------------
     Form inputmask.bundle.min.js  欄位格式
     --------------------------------------------*/
    $(":input[data-inputmask]").each(function () {
        $(this).inputmask();
    });

    /*--------------------------------------------
     Form repeater 欄位增加
     --------------------------------------------*/
    $(".repeater").each(function () {
        $(this).repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (remove) {
                if (confirm('Remove?')) {
                    $(this).slideUp(remove);
                }
            }
        });
    });

    /*--------------------------------------------
     Form daterangepicker 日期區間
     --------------------------------------------*/

    /** 單一日期 **/
    $('.datepicker-birthdate').each(function () {
        let $picker = $(this);
        $picker.daterangepicker({
            singleDatePicker: true,
            autoUpdateInput: false,
            showDropdowns: true,
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": dateRangePickerLanguage.date_format,
                "daysOfWeek": dateRangePickerLanguage.days_of_week,
                "monthNames": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            },
        });
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(dateRangePickerLanguage.date_format));
            $picker.change();
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });

    });

    /** 單一日期+時間 **/
    $('.datepicker-birthdateTime').each(function () {
        let $picker = $(this);
        $picker.daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": dateRangePickerLanguage.datetime_format,
                "daysOfWeek": dateRangePickerLanguage.days_of_week,
                "monthNames": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            }
        });
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(dateRangePickerLanguage.datetime_format));
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });
    });

    /** 常用區間下拉 **/
    $('.datepicker-reportrange').each(function () {
        let $picker = $(this);
        let start = moment().subtract(29, 'days');
        let end = moment();

        let langFormat = dateRangePickerLanguage.date_format;
        let thisRanges = {};
        thisRanges[dateRangePickerLanguage.ranges.today] = [moment(), moment()];
        thisRanges[dateRangePickerLanguage.ranges.yesterday] = [moment().subtract(1, 'days'), moment().subtract(1, 'days')];
        thisRanges[dateRangePickerLanguage.ranges.seven_days] = [moment().subtract(6, 'days'), moment()];
        thisRanges[dateRangePickerLanguage.ranges.thirty_days] = [moment().subtract(29, 'days'), moment()];
        thisRanges[dateRangePickerLanguage.ranges.this_month] = [moment().startOf('month'), moment().endOf('month')];
        thisRanges[dateRangePickerLanguage.ranges.last_month] = [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')];

        function cb(start, end) {
            $picker.html(start.format(langFormat) + ' ~ ' + end.format(langFormat));
        }

        $picker.daterangepicker({
            startDate: start,
            endDate: end,
            autoUpdateInput: false,
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": langFormat,
                "daysOfWeek": dateRangePickerLanguage.days_of_week,
                "monthNames": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            },
            ranges: thisRanges
        }, cb);
        cb(start, end);
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(langFormat) + ' ~ ' + picker.endDate.format(langFormat));
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });
    });

    /** 日期區間 **/
    $('.datepicker-datefilter').each(function () {
        let $picker = $(this);
        let langFormat = dateRangePickerLanguage.date_format;
        $picker.daterangepicker({
            autoUpdateInput: false,
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": dateRangePickerLanguage.date_format,
                "daysOfWeek": dateRangePickerLanguage.days_of_week,
                "monthNames": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            }
        });
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(langFormat) + ' ~ ' + picker.endDate.format(langFormat));
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });
    });

    /** 日期區間+時間 **/
    $('.datepicker-timepicker').each(function () {
        let $picker = $(this);
        let langFormat = dateRangePickerLanguage.datetime_format;
        $picker.daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            autoUpdateInput: false,
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": dateRangePickerLanguage.datetime_format
            }
        });
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(langFormat) + ' ~ ' + picker.endDate.format(langFormat));
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });
    });

    /** 限制區間固定天數 **/
    $('.datepicker-limit').each(function () {
        let $picker = $(this);
        let minDate = $picker.attr("minDate");
        let maxDate = $picker.attr("maxDate");
        let dateLimit = $picker.attr("dateLimit");
        let langFormat = dateRangePickerLanguage.datetime_format;
        $picker.daterangepicker({
            format: dateRangePickerLanguage.date_format,
            minDate: minDate,
            autoUpdateInput: false,
            maxDate: maxDate,
            dateLimit: {
                days: dateLimit
            },
            locale: {
                "cancelLabel": dateRangePickerLanguage.cancel_label,
                "format": dateRangePickerLanguage.datetime_format,
                "daysOfWeek": dateRangePickerLanguage.days_of_week,
                "monthNames": ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            }
        });
        $picker.on('apply.daterangepicker', function (ev, picker) {
            $picker.val(picker.startDate.format(langFormat) + ' - ' + picker.endDate.format(langFormat));
        });
        $picker.on('cancel.daterangepicker', function () {
            $picker.val('');
        });
    });

    /*--------------------------------------------
     bootstrap-colorpicker 顏色點選
     --------------------------------------------*/
    /** 顏色切換 **/
    $('.colorpicker-component').each(function () {
        $(this).colorpicker({
            format: 'rgba',
            colorSelectors: {
                'white': '#ffffff',
                'black': '#000000',
                'default': '#777777',
                'lightgray': '#ccc',
                'red': '#FF0000',
                'danger': '#d9534f',
                'warning': '#f0ad4e',
                'yellow': '#f7db1c',
                'primary': '#337ab7',
                'info': '#5bc0de',
                'success': '#5cb85c',
            }
        });
    });

    /** 更改背景顏色 **/
    $('.colorpicker-changebg').each(function () {
        var $dateName = $(this).attr("dateName");
        $(this).colorpicker({
            format: 'rgba',
            colorSelectors: {
                'white': '#ffffff',
                'black': '#000000',
                'default': '#777777',
                'lightgray': '#ccc',
                'red': '#FF0000',
                'danger': '#d9534f',
                'warning': '#f0ad4e',
                'yellow': '#f7db1c',
                'primary': '#337ab7',
                'info': '#5bc0de',
                'success': '#5cb85c',
            }
        });
        $(this).colorpicker().on('changeColor', function (e) {
            $($dateName)[0].style.backgroundColor = e.color.toString(
                'rgba');
        });
    });

    /** 更改文字顏色 **/
    $('.colorpicker-changefont').each(function () {
        var $dateName = $(this).attr("dateName");
        $(this).colorpicker({
            format: 'rgba',
            colorSelectors: {
                'white': '#ffffff',
                'black': '#000000',
                'default': '#777777',
                'lightgray': '#ccc',
                'red': '#FF0000',
                'danger': '#d9534f',
                'warning': '#f0ad4e',
                'yellow': '#f7db1c',
                'primary': '#337ab7',
                'info': '#5bc0de',
                'success': '#5cb85c',
            }
        });
        $(this).colorpicker().on('changeColor', function (e) {
            $($dateName)[0].style.color = e.color.toString('rgba');
        });
    });

    /*--------------------------------------------
     nestable 拖曳排序
     --------------------------------------------*/
    $('.nestable').each(function () {
      $(this).nestable();
    });

    /*--------------------------------------------
     Date fields for filter form
     --------------------------------------------*/
    $('.date-filter').each(function () {
      let $condition = $('select.date-filter-condition', $(this));
      let $dateStart = $('.date-filter-start', $(this));
      let $dateEnd = $('.date-filter-end', $(this));
      let $amount = $('.date-filter-amount', $(this));

      let fieldChange = function () {
        switch ($condition.val()) {
          case 'equal':
          case 'greater':
          case 'lesser':
            $dateStart.show();
            $dateEnd.hide(); $('input[type=text]', $dateEnd).val('');
            $amount.hide(); $('input[type=text]', $amount).val('');
            $('input[type=radio]', $amount).prop('checked', false);
            break;
          case 'between':
            $dateStart.show();
            $dateEnd.show();
            $amount.hide(); $('input[type=text]', $amount).val('');
            $('input[type=radio]', $amount).prop('checked', false);
            break;
          case 'past-after':
          case 'past-current-after':
          case 'past-before':
          case 'future-before':
          case 'future-current-before':
          case 'future-after':
            $dateStart.hide(); $('input[type=text]', $dateStart).val('');
            $dateEnd.hide(); $('input[type=text]', $dateEnd).val('');
            $amount.show();
            break;
          default:
            $dateStart.hide(); $('input[type=text]', $dateStart).val('');
            $dateEnd.hide(); $('input[type=text]', $dateEnd).val('');
            $amount.hide(); $('input[type=text]', $amount).val('');
            $('input[type=radio]', $amount).prop('checked', false);
        }
      };

      $condition.on('change', fieldChange).change();
    });

    /*--------------------------------------------
     單一價格欄位設定表格 (多幣別)
     --------------------------------------------*/
    $('.price-table-vue').each(function () {
      new Vue({
        el: this,
        data: {
          priceList: {},
          currencies: [],
          currentCurrency: '',
          currentPrice: null,
          active: false
        },
        mounted: function() {
          this.active = parseInt(this.$el.getAttribute('data-active')) === 1;
          let priceList = this.active ? JSON.parse(this.$el.getAttribute('data-price')) : {};
          this.priceList = priceList = Array.isArray(priceList) ? {} : priceList;
          this.currencies = Object.keys(priceList);
        },
        updated: function () {
          $(this.$refs.select).selectpicker('refresh');
          $(this.$refs.select).parent().addClass('bs-select');
        },
        computed: {
          oActive: {
            set(val) { this.active = val === 'true' || val === true || val === 1; },
            get() { return this.active; }
          }
        },
        methods: {
          addRow: function () {
            if (this.currentCurrency) {
              let title = $('option[value=' + this.currentCurrency + ']', $(this.$refs.select)).text();
              this.$set(this.priceList, this.currentCurrency, {title: title, price: this.currentPrice});
              this.currencies.push(this.currentCurrency);
              this.currentCurrency = '';
              this.currentPrice = null;
            }
          },
          removeRow: function (currency) {
            this.$delete(this.priceList, currency);
            this.$delete(this.currencies, this.currencies.indexOf(currency));
          }
        }
      });
    });

});

/**
 * TinyMCE default setting
 *
 * @param  {Object} extraSettings
 * @param  {string} managerUrl
 * @return {Object}
 */
const tinyDefaultSettings = function(extraSettings, managerUrl = '') {
  let tinymceSettings = {
    plugins: 'preview searchreplace autolink directionality code visualblocks visualchars fullscreen image link media template table charmap hr pagebreak nonbreaking anchor insertdatetime lists imagetools textpattern',
    toolbar: 'fontselect fontsizeselect | bold italic strikethrough underline forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat',
    menubar: 'edit insert format table view',
    importcss_append: true,
    image_advtab: true,
    relative_urls: true,
    convert_urls: false,
    valid_children: '+a[div|h1|h2|h3|h4|h5|h6|p|ul|ol]',
    extended_valid_elements:"style,script[src],link[href|rel],i[id|class|style]",
    custom_elements:"style,~style,script,~script,link,~i",
    branding: false,
    font_formats: '微軟正黑=microsoft jhenghei; 微軟雅黑=microsoft yahei; 新細明體=times new roman,times,pmingliu; 黑體=heiti tc,heiti sc; Arial=arial,helvetica,sans-serif; Georgia=georgia,palatino; Helvetica=helvetica; Tahoma=tahoma,arial,helvetica,sans-serif; Verdana=verdana,geneva',
    fontsize_formats: '12px 14px 16px 18px 24px 36px 48px',
    file_picker_callback: function(callback, value, meta) {
      if (managerUrl !== '') {
        tinymce.activeEditor.windowManager.open({
          title: 'File Manager',
          size: 'large',
          body: {
            type: 'panel',
            items: [{
              type: 'htmlpanel',
              html: '<iframe class="elfinder-manager" style="width:100%;height:100%" src="' + managerUrl + '"/>'
            }]
          },
          buttons: []
        });
        tinymce.activeEditor.windowManager._elfinderCallBack = function (file, fm) {
          let url = fm.convAbsUrl(file.url);
          let info = file.name + ' (' + fm.formatSize(file.size) + ')';
          if (meta.filetype === 'file') callback(url, {text: info, title: info});
          if (meta.filetype === 'image') callback(url, {alt: info});
          if (meta.filetype === 'media') callback(url);
        };
        try {
          let myIfm = document.querySelector('div.tox-dialog__body-content > div > div > iframe.elfinder-manager');
          if (myIfm) {
            let pStyle = myIfm.parentElement.style;
            pStyle.height = '100%';
            pStyle.overflow = 'hidden';
            myIfm.parentElement.parentElement.parentElement.parentElement.nextElementSibling.style.display = 'none';
          }
        } catch (e) {}
      }
      return false;
    },
    setup: function (editor) {
      editor.on('keyup', function () { jQuery('#' + editor.id).change(); });
    }
  };

  if (Object.keys(extraSettings).length > 0) {
    for (let key in extraSettings) {
      if (extraSettings.hasOwnProperty(key)) {
        tinymceSettings[key] = extraSettings[key];
      }
    }
  }

  return tinymceSettings;
};

const substringMatcher = function(strings) {
  return function findMatches(q, cb) {
    let matches = [], substringRegex = new RegExp(q, 'i');
    $.each(strings, function(i, str) {
      if (substringRegex.test(str)) matches.push(str);
    });
    cb(matches);
  };
};

const imageResize = function(file, maxWidth, maxHeight, afterCall = null) {
  let _URL = window.URL || window.webkitURL;
  let image = new Image();
  image.onload = function () {
    let _img = this;
    let canvas = document.createElement('canvas');
    let ctx = canvas.getContext('2d');
    ctx.drawImage(img, 0, 0);

    let width = _img.width, height = _img.height;

    if (width > height) {
      if (width > maxWidth) {
        height *= maxWidth / width;
        width = maxWidth;
      }
    } else {
      if (height > maxHeight) {
        width *= maxHeight / height;
        height = maxHeight;
      }
    }

    canvas.width = width;
    canvas.height = height;
    ctx.transform(1, 0, 0, 1, 0, 0);
    ctx.drawImage(_img, 0, 0, width, height);

    let dataUrl = canvas.toDataURL(file.type, 1);

    if (typeof afterCall === 'function') {
      afterCall(dataUrl, file.name);
    }
  };
  image.src = _URL.createObjectURL(file);
};

const serializeFormNode = function (data, keys, value) {
  if (keys.length === 0) return (value === '' || value === null || typeof value === 'undefined') ? null : value;

  let key = keys.shift();
  if (!key) {
    data = data || [];
    if (Array.isArray(data)) {
      key = data.length;
    }
  }

  let index = +key;
  if (!isNaN(index)) {
    data = data || [];
    key = index;
  }

  data = data || {};
  data[key] = serializeFormNode(data[key], keys, value);

  return data;
}

const serializeForm = function (form) {
  return Array.from((new FormData(form)).entries())
    .reduce((data, [field, value]) => {
      let [_, prefix, keys] = field.match(/^([^\[]+)((?:\[[^\]]*\])*)/);

      if (keys) {
        keys = Array.from(keys.matchAll(/\[([^\]]*)\]/g), m => m[1]);
        value = serializeFormNode(data[prefix], keys, value);
      }
      data[prefix] = value;
      return data;
    }, {});
}
