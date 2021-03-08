<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Javascript modules Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain for javascript modules.
    |
    */

    'dateRangePicker' => [
        'ranges' => [
            'today' => '今天',
            'yesterday' => '昨天',
            'seven_days' => '最近7天',
            'thirty_days' => '最近30天',
            'this_month' => '本月',
            'last_month' => '上月'
        ],
        'days_of_week' => ['日', '一', '二', '三', '四', '五', '六'],
        'date_format' => 'YYYY-MM-DD',
        'datetime_format' => 'YYYY-MM-DD HH:mm:00',
        'cancel_label' => '清除'
    ],

    'sweetAlert' => [
        'single_delete' => [
            'title' => '是否確認刪除',
            'text' => '您將刪除選取內容，一但刪除將無法還原',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
        ],
        'single_trash' => [
            'title' => '是否確認丟入回收桶',
            'text' => '您選取內容將丟入回收桶，您尚可以於回收桶將資料還原',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
        ],
        'multi_switch' => [
            'title' => '是否確認批次更新狀態',
            'text' => '您將批次更新選取內容的狀態',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
            'error_title' => '批次更新失敗',
            'error_text' => '批次更新資料狀態失敗，請再次嘗試',
        ],
        'multi_update' => [
            'title' => '是否確認批次更新',
            'text' => '您將批次更新選取的內容',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
            'error_title' => '批次更新失敗',
            'error_text' => '批次更新資料失敗，請再次嘗試',
            'success_title' => '批次更新成功',
            'success_text' => '您操作的批次更新資料成功！',
        ],
        'multi_delete' => [
            'title' => '是否確認批次刪除',
            'text' => '您將批次刪除選取內容，一但刪除將無法還原',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
            'error_title' => '批次刪除失敗',
            'error_text' => '批次刪除資料失敗，請再次嘗試',
        ],
        'multi_trash' => [
            'title' => '是否確認批次丟入回收桶',
            'text' => '您選取內容將批次丟入回收桶，您尚可以於回收桶將資料還原',
            'cancelButtonText' => '取消',
            'confirmButtonText' => '確認',
            'error_title' => '批次丟入回收桶失敗',
            'error_text' => '資料批次丟入回收桶失敗，請再次嘗試',
        ],
        'selected_none' => [
            'title' => '操作錯誤',
            'text' => '請勾選您要進行操作的項目',
        ],
    ],

    'datatable' => [
        'decimal' => '',
        'emptyTable' => '無資料',
        'info' => '<span class="text-muted"> ，顯示 _START_ 到 _END_ 筆，共 _TOTAL_ 筆</span>',
        'infoEmpty' => '總共 0 筆資料',
        'infoFiltered' => '(篩選原 _MAX_ 筆資料)',
        'infoPostFix' => '',
        'thousands' => ',',
        'lengthMenu' => '<span class="mr-1 text-muted">每頁</span>  _MENU_',
        'loadingRecords' => '讀取資料中...',
        'processing' => '資料處理中...',
        'search' => '<i class="icon-search"></i> 搜尋：',
        'zeroRecords' => '無資料',
        'paginate' => [
            'first' => '<i class="icon-first_page"></i>',
            'last' => '<i class="icon-last_page"></i>',
            'next' => '<i class="icon-keyboard_arrow_right"></i>',
            'previous' => '<i class="icon-keyboard_arrow_left"></i>',
        ],
        'aria' => [
            'sortAscending' => ': 升序',
            'sortDescending' => ': 降序',
        ],
        'buttons' => [
            'colvis' => '欄位',
        ]
    ],

    'validate' => [
        'required' => '請輸入',
        'remote' => '請修正',
        'email' => '請輸入 Email 格式',
        'url' => '請輸入網址格式',
        'date' => '請輸入日期格式',
        'dateISO' => '請輸入有效日期 (YYYY-MM-DD)',
        'creditcard' => '請輸入有效的信用卡號碼',
        'number' => '請輸入數字',
        'digits' => '請輸入數字',
        'equalTo' => '您輸入的不相同',
        'maxlength' => '不能超過 {0} 字元',
        'minlength' => '最少需 {0} 字元',
        'rangelength' => '請輸入長度在 {0} 到 {1} 之間字元',
        'range' => '請在 {0} 到 {1} 之間輸入一個值',
        'max' => '請輸入小於或等於 {0} 的數值',
        'min' => '請輸入大於或等於 {0} 的數值',
        'step' => '請輸入 {0} 的倍數',
        'onelinemessage' => '您還有 {0} 個欄位有問題',
    ],

];
