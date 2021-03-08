<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Administrator Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the system text in admin page.
    |
    */

    'page_not_found' => [
        'title' => '找不到頁面',
        'message' => '對不起，您所請求的頁面不存在。',
    ],

    'maintaining' => [
        'title' => '系統維護中',
        'message' => '對不起，系統正在維護中，請稍後再次拜訪。',
    ],

    'header' => [
        'menu' => '選單',
        'filter' => '自訂篩選',
        'filter_close' => '關閉',
        'filter_public' => '公用查詢',
        'filter_private' => '自訂查詢',
        'profile' => '個人資料',
        'language' => '語系',
        'account' => '帳戶',
        'login' => '登入',
        'logout' => '登出',
    ],

    'breadcrumbs' => [
        'home' => '系統首頁',
    ],

    'sidebar' => [
        'home' => '系統首頁',
    ],

    'login' => [
        'title' => '總後臺管理系統',
        'forget' => '忘記密碼?',
        'username' => '您的帳號',
        'email' => '您的信箱',
        'password' => '您的密碼',
        'captcha' => '驗證號碼',
        'two_fa' => '兩段驗證',
        'remember' => '記住我',
        'resend_two_fa' => '重新發送驗證碼',
        'login_submit' => '登入系統',
        'forget_submit' => '送出',
        'login_again' => '重新登入',
        'back_button' => '返回',
        'info' => [
            'topic' => 'Welcome!',
            'message' => '歡迎您使用:site，<br>若您於登入上有任何問題，<br>請來信與我們聯絡，我們將會盡快為您處理!<br>祝您使用愉快與方便!',
            'forget' => '輸入您的 Email 系統將寄發密碼至您的註冊信箱.',
            'verify_expired' => '您的兩段式驗證請求已經逾期或失效，請重新登入取得新的驗證碼。',
            'verify_timer' => '請在 :time 內進行驗證，否則驗證碼將失效。',
        ],
    ],

    'dashboard' => [
        'source_from' => '流量來源',
        'visits' => '訪問',
        'online_users' => '線上使用者',
        'new_session' => '新工作階段',
        'session_page' => '單次頁數',
        'stay_time' => '停留時間',
        'exit_rate' => '跳出率',
        'browser_usage' => '瀏覽器使用',
        'source_country' => '流量地區分布',
        'today_visitors' => '今日參觀量',
        'service_message' => '客服信函',
        'recently_message' => '近期聯絡表單',
        'empty_message' => '沒有聯絡表單',
        'view_all' => '瀏覽全部',
        'path' => '網頁',
        'path_view' => '瀏覽量',
        'path_time' => '平均停留時間',
        'keywords' => '熱門關鍵字',
        'keyword' => '關鍵字',
        'keyword_count' => '次數',
        'medium' => [
            'direct' => '直接',
            'organic' => '搜尋',
            'referral' => '推薦',
            'json_direct' => 'Direct 直接',
            'json_organic' => 'Organic 搜尋',
            'json_referral' => 'Referral 推薦',
        ],
    ],

    'grid' => [
        'title' => [
            'action' => '動作'
        ],
        'actions' => [
            'view' => '瀏覽',
            'edit' => '編輯',
            'log' => '紀錄',
            'delete' => '刪除',
            'restore' => '復原',
            'children' => '新增子項',
        ],
        'selection' => [
            'all' => '全部',
        ],
        'back' => '返回',
        'batch' => '批次',
        'root' => '根列表',
        'next_layer' => '下層列表',
        'click_to_switch' => '點選變更狀態',
        'search' => '搜尋',
        'filter' => '篩選',
    ],

    'form' => [
        'show' => '瀏覽',
        'create' => '新增',
        'edit' => '編輯',
        'copy' => '複製',
        'preview' => '預覽',
        'language' => '語系',
        'import' => '匯入',
        'export' => '匯出',
        'back_list' => '返回列表',
        'help' => '說明',
        'record' => '系統紀錄',
        'note' => '說明敘述',
        'web_url' => '前臺網址',
        'language_usage' => [
            '0' => '隱藏',
            '1' => '顯示',
            'hint' => '點選變更狀態',
            'label' => '目前語系',
        ],
        'select_default_title' => '請選擇項目',
        'select_nothing_title' => '不選擇',
        'password_build_auto' => '自動產生密碼',
        'select_all' => '選擇全部',
        'select_clear' => '清除選取',
        'fieldSet' => [
            'default' => '主要設定',
            'information' => '資訊設定',
            'media' => '多媒體設定',
            'advanced' => '進階選項',
            'permission' => '權限設定',
            'seo' => '搜尋引擎優化',
            'system_record' => '系統紀錄',
        ],
        'button' => [
            'send' => '送出',
            'reset' => '重新設定',
            'cancel' => '取消',
            'import' => '匯入',
            'export' => '匯出',
            'media_image' => '媒體庫',
            'media_file' => '選擇檔案',
        ],
        'file' => [
            'default_text' => '檔案上傳',
            'image_text' => '圖片上傳',
            'browser' => '瀏覽',
            'remove_file' => '移除已上傳的檔案',
            'limit_title' => '超過選擇上限',
            'limit_text' => '您最多只能選擇 :limit 個檔案',
        ],
        'image' => [
            'advance' => [
                'tab' => '圖片資訊',
                'fieldSet' => [
                    'base' => '基本設定',
                    'detail' => '詳細資訊',
                    'option' => '進階選項',
                ],
                'field' => [
                    'path' => '檔案',
                    'title' => '標題',
                    'description' => '備註',
                    'media' => '影音',
                    'creator' => '作者',
                    'copyright' => '版權',
                    'device' => '裝置',
                    'cover' => '封面',
                    'size' => '尺寸',
                    'max_width' => '最大寬度',
                    'max_height' => '最大高度',
                    'min_width' => '最小寬度',
                    'min_height' => '最小高度',
                ],
                'options' => [
                    'device_all' => '全部',
                    'device_desktop' => '電腦螢幕',
                    'device_mobile' => '行動裝置',
                    'cover_0' => '停用',
                    'cover_1' => '啟用',
                ],
            ],
            'anchor' => [
                'tab' => '標點設定',
            ],
            'submit' => '完成',
        ],
        'address' => [
            'zip' => '郵遞區號',
            'country' => '國家',
            'state' => '州區',
            'county' => '縣市',
            'city' => '城鎮',
            'street' => '街道地址',
        ],
        'message' => [
            'create_success' => '您新增的資料儲存成功。',
            'create_error' => '您的新增資料操作失敗。',
            'edit_success' => '您編輯的資料儲存成功。',
            'edit_error' => '您編輯的資料儲存失敗。',
            'delete_success' => '您選擇的資料已經刪除成功。',
            'delete_error' => '您選擇的資料無法刪除，請再次確認。',
            'delete_error_account_self' => '您無法刪除自己的帳號，請再次確認。',
            'import_success' => '您的資料已經匯入成功。',
            'import_error' => '您的資料匯入失敗，請再次確認。',
            'import_error_extension' => '您的來源檔案不符合要求格式，請再次確認。',
            'export_error' => '您的資料匯出失敗，請再次嘗試。',
            'restore_success' => '您的資料復原成功。',
            'restore_error' => '您的資料復原失敗。',
            'language_switch_success' => '您的資料語系顯示切換已成功。',
            'language_switch_error' => '您的資料語系顯示切換失敗。',
        ],
        'elfinder' => [
            'hint_suffix' => '資料夾與檔案命名僅可使用英文、數字、底線、橫線，請勿使用其他文字符號。',
            'limit_title' => '已達到選擇上限',
            'limit_text' => '您最多只能選擇 :limit 個檔案',
            'limit_confirm_button' => '確認',
            'remove_title' => '是否確認刪除',
            'remove_text' => '您將刪除此項目，但檔案仍會保留',
            'remove_cancel_button' => '取消',
            'remove_confirm_button' => '確認',
            'remove_success_title' => '刪除完成!',
            'remove_success_text' => '您的檔案已刪除!',
        ],

        'SearchFilter' => [
            'option' => [
                'public' => [
                    '0' => '僅自己可見',
                    '1' => '所有用戶可見',
                    '2' => '僅選取群組可見：',
                ]
            ],
            'filters_button' => '篩選條件',
            'filters_clear' => '清除條件',
            'filters_admit' => '確認',

            'date_filter' => [
                'year' => '年',
                'quarter' => '季',
                'month' => '月',
                'week' => '週',
                'day' => '日',

                'empty' => '不使用',
                'equal' => '等於',
                'greater' => '大於等於(>=)',
                'lesser' => '小於等於(<=)',
                'between' => '日期區間',
                'past_after' => '在過去...之內',
                'past_current_after' => '在過去...之內(現)',
                'past_before' => '在過去...之前',
                'future_before' => '在未來...之內',
                'future_current_before' => '在未來...之內(現)',
                'future_after' => '在未來...之後',
                'today' => '今天',
                'this_week' => '本週',
                'this_month' => '本月',
                'this_quarter' => '本季',
                'this_year' => '今年',
                'blank' => '無資料',
                'filled' => '有資料',
            ],
        ],
    ],

];
