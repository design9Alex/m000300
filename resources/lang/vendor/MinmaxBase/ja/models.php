<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models (Database Column) Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the system text in backend platform page.
    |
    */

    'Administrator' => [
        'guid' => 'ID',
        'username' => '帳號',
        'password' => '密碼',
        'password_confirmation' => '密碼確認',
        'name' => '姓名',
        'allow_ip' => 'IP白名單',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'allow_ip' => '請斷行設定可登入來源IP位置，空白表示可自任何地方登入',
            'password' => '若不需更新密碼，請維持此欄位空白',
            'password_confirmation' => '請再次輸入密碼；若不需更新密碼，請維持此欄位空白',
        ],
    ],

    'Admin' => [
        'guid' => 'ID',
        'username' => '帳號',
        'password' => '密碼',
        'password_confirmation' => '密碼確認',
        'name' => '姓名',
        'email' => 'Email',
        'mobile' => '電話',
        'details' => '詳細資料',
        'expired_at' => '到期時間',
        'two_fa' => '兩段式驗證',
        'force_reset' => '強制更新密碼',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'role_id' => '群組',
        'hint' => [
            'password' => '若不需更新密碼，請維持此欄位空白',
            'password_confirmation' => '請再次輸入密碼；若不需更新密碼，請維持此欄位空白',
            'expired_at' => '超過到期時間後，該帳號將不可再登入。',
            'two_fa' => '啟用兩段式驗證將保障您的帳號更安全。',
            'force_reset' => '下次登入時強制要求更新密碼',
        ],
    ],

    'AdminMenu' => [
        'guid' => 'ID',
        'title' => '選單名稱',
        'uri' => 'Uri',
        'controller' => 'Controller 名稱',
        'model' => 'Model 名稱',
        'class' => '類別',
        'parent_id' => '上層目錄',
        'link' => '項目連結',
        'icon' => '圖示 Class',
        'permission_key' => '權限綁定代碼',
        'guide' => '操作手冊連結',
        'options' => '選單設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'uri' => '此參數為唯一值，不可與其他項目重複。',
            'icon' => '僅第二層須設定，請參考連結選擇您所需要的圖示 <a target="_blank" href="/static/admin/css/fonts/icon/demo.html">圖示列表</a>。',
            'guide' => '選單項目的功能操作手冊連結網址，請使用相對路徑 <code>/guide/web#id-name</code>。',
            'options' => '選單額外的特殊參數設定。',
        ],
        'admin_menus_count' => '子選單',
    ],

    'WebMenu' => [
        'guid' => 'ID',
        'title' => '選單名稱',
        'details' => '詳細內容',
        'uri' => '識別標籤',
        'controller' => 'Controller 名稱',
        'model' => 'Model 名稱',
        'class' => '類別',
        'parent_id' => '上層目錄',
        'link' => '項目連結',
        'permission_key' => '權限綁定代碼',
        'options' => [
            'target' => '目標視窗',
        ],
        'seo' => [
            'meta_description' => 'SEO 網站描述',
            'meta_keywords' => 'SEO 關鍵字',
        ],
        'sort' => '排序',
        'editable' => '可否編輯',
        'protected' => '保留項目',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'uri' => '此參數用於判斷當前頁面是否與此項目相關。若外部連結可留白。',
            'seo' => [
                'meta_description' => '(Metadata Description) 利用簡短的說明讓人清楚的了解網站的主要內容、簡介方向等，搜尋引擎將會幫我們適當的顯示在介紹頁面上。',
                'meta_keywords' => '(Metadata Keywords) 為了幫助搜尋引擎更容易搜尋到網站，你可以在這裡填寫相關的搜尋字詞，多組關鍵字以上請使用半形逗號區隔。',
            ],
            'protected' => '系統保留項目，不可刪除，並且部分欄位不可編輯。',
        ],
        'web_menus_count' => '子選單',

        'hint' => [
            'details' => [
                'pic' => '電腦版圖片尺寸 w1920 * h540，手機版圖片尺寸 w768 * h768',
            ],
        ],
    ],

    'Role' => [
        'id' => 'ID',
        'guard' => '平台',
        'name' => '代碼',
        'display_name' => '角色名稱',
        'description' => '敘述',
        'group_code' => '群組代碼',
        'options' => '功能設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'name' => '請輸入英文或數字，設定後請盡量不更動，依據網站不同功能會有所影響。此為唯一值，不可重複。',
            'group_code' => '輸入自定義的群組代碼，以將此角色定義為相同群組內的等級。僅適用於 Web 平台。',
        ],
    ],

    'Permission' => [
        'id' => 'ID',
        'guard' => '平台',
        'category' => '類別',
        'group' => '群組',
        'name' => '代碼',
        'label' => '標籤',
        'display_name' => '權限名稱',
        'description' => '敘述',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
    ],

    'WorldLanguage' => [
        'id' => 'ID',
        'code' => '語系代碼',
        'name' => '語系名稱',
        'native' => '顯示文字',
        'options' => '語系設定',
        'currency_id' => '貨幣',
        'sort' => '排序',
        'active_admin' => '後臺啟用',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
    ],

    'Firewall' => [
        'id' => 'ID',
        'title' => '名稱',
        'description' => '說明',
        'guard' => '平台',
        'ip' => 'IP 位址',
        'user_agent' => 'Agent限制',
        'rule' => '規則',
        'start_at' => '開始時間',
        'end_at' => '結束時間',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'ip' => '您可以分行填寫多個 IP 規則。範例：<code>192.168.1.10</code>、<code>192.168.1.*</code>、<code>192.168.1.10~192.168.1.50</code>。',
            'user_agent' => '使用半形分號 <code>;</code> 分隔。只要使用者的 User-Agent 包含您指定的任意字段，則符合規則。範例：<code>Firefox</code>、<code>Android</code>。',
            'start_at' => '如果需要在未來期限到後自動應用，請在此設定一個時間。',
            'end_at' => '如果需要在有效期限過後自動停用，請在此設定一個時間。',
            'sort' => '防火牆規則將會依照排序依序比對。',
        ],
    ],

    'WebData' => [
        'guid' => 'ID',
        'guard' => '平台',
        'website_name' => '網站名稱',
        'system_email' => '系統信箱',
        'system_mobile' => '系統電話',
        'system_url' => '網站網址',
        'system_logo' => '網站Logo',
        'company' => '公司資訊',
        'contact' => '聯絡資訊',
        'social' => '社群連結',
        'seo' => [
            'meta_description' => 'SEO 網站描述',
            'meta_keywords' => 'SEO 關鍵字',
        ],
        'options' => [
            'head' => '標頭內容',
            'body' => '頁首內容',
            'foot' => '頁尾內容',
        ],
        'information' => [
            'cookie_eula' => 'EULA 訊息',
        ],
        'active' => '網站狀態',
        'offline_text' => '網站離線訊息',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'system_logo' => '建議尺寸：190px * 30px。圖片類型：png。',
            'seo' => [
                'meta_description' => '(Metadata Description) 利用簡短的說明讓人清楚的了解網站的主要內容、簡介方向等，搜尋引擎將會幫我們適當的顯示在介紹頁面上。',
                'meta_keywords' => '(Metadata Keywords) 為了幫助搜尋引擎更容易搜尋到網站，你可以在這裡填寫相關的搜尋字詞，多組關鍵字以上請使用半形逗號區隔。',
            ],
            'options' => [
                'head' => '此處內容將會放置於網頁標頭 (&lt;/head&gt;之前)，您可以於此處貼上 Google Analytics 或其他追蹤程式碼。',
                'body' => '此處內容將會出現於網頁最上方 (&lt;body&gt;之後)，若您不清楚網頁結構，請勿修改此處內容。',
                'foot' => '此處內容將會出現於網頁最下方 (&lt;/body&gt;之前)，若您不清楚網頁結構，請勿修改此處內容。',
            ],
            'information' => [
                'cookie_eula' => '網站前臺是否顯示 Cookie 機制使用之通知訊息，以符合歐盟網路隱私權法律規範。',
            ],
            'offline_text' => '當網站處於離線狀態時顯示給使用者看到的訊息。',
        ],
    ],

    'EditorTemplate' => [
        'id' => 'ID',
        'guard' => '平台',
        'category' => '使用類別',
        'title' => '名稱',
        'description' => '敘述',
        'editor' => 'HTML內容',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
    ],

    'SiteDashboard' => [
        'id' => 'ID',
        'guard' => '平台',
        'title' => '標題',
        'presenter' => '模組涵式',
        'position' => [
            'row' => '行位置',
            'column' => '列位置',
            'width' => '寬度',
            'height' => '高度',
        ],
        'options' => '模組設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'position' => [
                'row' => '儀表板行數，請輸入數字，以設定顯示於指定行。',
                'column' => '同一行中的左右顯示順序。',
                'width' => '採用 Bootstrap Grid 規則，請輸入 1-12 數字。',
                'height' => '此為區塊最小高度，請輸入 px 單位數字。',
            ],
            'sort' => '僅於同行同列時應用排序。',
        ],
    ],

    'SystemTrash' => [
        'id' => 'ID',
        'uri' => '選單功能',
        'rubbish_type' => 'Model',
        'rubbish_id' => '項目ID',
        'rubbish_repository' => 'Repository',
        'subject_column' => '標題',
        'admin_id' => '管理者',
        'created_at' => '刪除時間',
    ],

    'ServiceConfig' => [
        'id' => 'ID',
        'code' => '服務代碼',
        'group' => '服務群組',
        'title' => '標題',
        'host' => '連線位置',
        'options' => '服務設定',
        'parameters' => '服務參數',
        'routes' => '路由對應',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'parameters-title' => '可用參數說明',
        'hint' => [
            'host' => '若有特定連線埠口，請使用半形冒號 <code>:</code> 設置。若未指定埠口則採用服務預設設定。',
            'parameters' => '設定參數說明，以於後台管理系統提供參數提示。',
            'routes' => '設定特定鍵值所對應的路由名稱。',
        ],
    ],

    'SystemLog' => [
        'guard' => '平台',
        'uri' => '操作網址',
        'action' => '動作',
        'id' => '項目ID',
        'username' => '帳號',
        'ip' => 'IP 位置',
        'remark' => '文字說明',
        'result' => '狀態',
        'created_at' => '紀錄時間',
    ],

    'LoginLog' => [
        'guard' => '平台',
        'username' => '帳號',
        'ip' => 'IP 位置',
        'remark' => '文字說明',
        'result' => '狀態',
        'created_at' => '紀錄時間',
    ],

    'SystemParameterGroup' => [
        'id' => 'ID',
        'code' => '群組代碼',
        'title' => '群組名稱',
        'options' => '群組設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'code' => '此代碼為唯一值，不可與其他群組重複。',
            'options' => '可自由增加設定參數，將會以 <code>Key => Value</code> 的陣列形式存取。',
        ],
        'system_parameter_items_count' => '項目數',
    ],

    'SystemParameterItem' => [
        'id' => 'ID',
        'group_id' => '參數群組',
        'value' => '參數數值',
        'label' => '參數名稱',
        'options' => '參數設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'value' => '此代碼為唯一值，不可與同群組的其他參數重複。',
            'options' => '可自由增加設定參數，將會以 <code>Key => Value</code> 的陣列形式存取。',
        ],
    ],

    'SiteParameterGroup' => [
        'id' => 'ID',
        'code' => '群組代碼',
        'title' => '群組名稱',
        'category' => '群組類別',
        'options' => '群組設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'editable' => '可否編輯',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'code' => '此代碼為唯一值，不可與其他群組重複。',
            'options' => '可自由增加設定參數，將會以 <code>Key => Value</code> 的陣列形式存取。',
        ],
        'site_parameter_items_count' => '項目數',
    ],

    'SiteParameterItem' => [
        'id' => 'ID',
        'group_id' => '參數群組',
        'value' => '參數數值',
        'label' => '參數名稱',
        'details' => [
            'description' => '描述說明',
            'editor' => '詳細內容',
            'pic' => '顯示圖片',
        ],
        'options' => '參數設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'editable' => '可否編輯',
        'created_at' => '建立時間',
        'updated_at' => '更新時間',
        'hint' => [
            'value' => '此代碼為唯一值，不可與同群組的其他參數重複。',
            'details' => [
                'pic' => '圖片類型：jpg、png。數量限制：1 張。',
            ],
            'options' => '可自由增加設定參數，將會以 <code>Key => Value</code> 的陣列形式存取。',
        ],
    ],

    'ColumnExtension' => [
        'id' => 'ID',
        'table_name' => '資料表',
        'column_name' => '主欄位名稱',
        'sub_column_name' => '欄位名稱',
        'title' => '欄位標籤',
        'options' => '欄位設定',
        'sort' => '排序',
        'active' => '啟用狀態',
        'hint' => [
            'options' => '必須有 <code>method</code> 參數，其他依欄位需求增減。',
        ],
    ],

    'SearchCategory' => [
        'id' => 'ID',
        'guard' => '平台',
        'title' => '類別名稱',
        'module' => '模組項目',
        'repository' => 'Repository',
        'filter_view' => '篩選介面',
        'filter_name' => '表單欄位',
        'sort' => '排序',
        'active' => '啟用狀態',
        'hint' => [
            'module' => '模組代碼，通常為後臺選單的 <code>uri</code>。',
        ],
        'option' => [
            'guard' => [
                'web' => '前臺',
                'admin' => '後臺',
                'administrator' => '總管理後臺',
            ],
        ],
    ],

    'SearchFilter' => [
        'id' => 'ID',
        'category_id' => '搜尋類別',
        'owner_type' => '擁有者Class',
        'owner_id' => '擁有者ID',
        'title' => '搜尋名稱',
        'filters' => '篩選條件',
        'public' => '公用狀態',
        'visitor_roles' => '公用群組',
        'sort' => '排序',
        'active' => '啟用狀態',
        'hint' => [
            'public' => '此功能僅擁有<code>公用</code>權限者可使用，其他使用者僅能建立私人的查詢。',
        ],
        'owner' => '擁有者',
    ],

];
