<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Please remove this method before give source code
        // to customer or upload to server.
        $this->updateAdminPassword();

        $this->updateLanguageResource();

        $this->insertWebMenu();

        $this->insertInboxCategory();
    }

    /**
     * Please remove this method before give source code
     * to customer or upload to server.
     */
    protected function updateAdminPassword()
    {
        $timestamp = date('Y-m-d H:i:s');

        DB::table('administrator')->where('username', 'sysadmin')->update(['password' => Hash::make('m24241872@M')]);
        DB::table('admin')->where('username', 'sysadmin')->update(['password' => Hash::make('m24241872@M')]);
        DB::table('admin')->where('username', 'admin')->update(['password' => Hash::make('24241872')]);

        $sysadmin = DB::table('admin')->where('username', 'sysadmin')->first();
        $admin = DB::table('admin')->where('username', 'admin')->first();

        DB::table('password_history')->insert([
            ['id' => uuidl(), 'user_id' => $sysadmin->id, 'user_type' => \Minmax\Base\Models\Admin::class,
                'password' => $sysadmin->password, 'ip' => '127.0.0.1', 'created_at' => $timestamp],
            ['id' => uuidl(), 'user_id' => $admin->id, 'user_type' => \Minmax\Base\Models\Admin::class,
                'password' => $admin->password, 'ip' => '127.0.0.1', 'created_at' => $timestamp],
        ]);
    }


    protected function updateLanguageResource(){
        $systemParameters = DB::table('language_resource')->where('key','like','%system_parameter_group.title.%')->where('language_id','1')->get();

        foreach($systemParameters as $key => $item){
            DB::table('language_resource')->where('key', $item->key)->whereIn('language_id',[3,4])->update(['text' => $item->text]);
        }

        $systemParameters = DB::table('language_resource')->where('key','like','%system_parameter_item.label.%')->where('language_id','1')->get();

        foreach($systemParameters as $key => $item){
            DB::table('language_resource')->where('key', $item->key)->whereIn('language_id',[3,4])->update(['text' => $item->text]);
        }
    }



    protected function insertWebMenu()
    {
        $timestamp = date('Y-m-d H:i:s');
        $languageList = SeederHelper::getLanguageIdList();
        $languageResourceData = [];

        $insertWebMenuData = [
            [
                'id' => $menuRootId1 = uuidl(),
                'parent_id' => null,
                'title' => 'web_menu.title.' . $menuRootId1,
                'uri' => 'root-header',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => null,
                'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
            [
                'id' => $menuId1 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId1,
                'uri' => 'about',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 1, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
            [
                'id' => $menuId2 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId2,
                'uri' => 'news',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 2, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
            [
                'id' => $menuRootId2 = uuidl(),
                'parent_id' => null,
                'title' => 'web_menu.title.' . $menuRootId2,
                'uri' => 'root-footer',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => null,
                'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
        ];

        DB::table('web_menu')->insert($insertWebMenuData);

        $webMenuLanguage = [
            'zh-Hant' => [
                ['id' => $menuRootId1, 'title' => '網站主選單', 'link' => null],
                    ['id' => $menuId1, 'title' => '關於我們', 'link' => url('page/about')],
                    ['id' => $menuId2, 'title' => '最新消息', 'link' => url('news/categories/with-category-id')],
                ['id' => $menuRootId2, 'title' => '頁尾選單', 'link' => null]
            ],
            'zh-Hans' => [
                ['id' => $menuRootId1, 'title' => '网站主选单', 'link' => null],
                    ['id' => $menuId1, 'title' => '关于我们', 'link' => url('zh-hans/page/about')],
                    ['id' => $menuId2, 'title' => '最新消息', 'link' => url('zh-hans/news/categories/with-category-id')],
                ['id' => $menuRootId2, 'title' => '页尾选单', 'link' => null]
            ],
            'ja' => [
                ['id' => $menuRootId1, 'title' => 'サイトメニュー', 'link' => null],
                    ['id' => $menuId1, 'title' => '会社概要', 'link' => url('ja/page/about')],
                    ['id' => $menuId2, 'title' => 'ニュース', 'link' => url('ja/news/categories/with-category-id')],
                ['id' => $menuRootId2, 'title' => 'フッターメニュー', 'link' => null]
            ],
            'en' => [
                ['id' => $menuRootId1, 'title' => 'Site Main Menu', 'link' => null],
                    ['id' => $menuId1, 'title' => 'About', 'link' => url('en/page/about')],
                    ['id' => $menuId2, 'title' => 'News', 'link' => url('en/news/categories/with-category-id')],
                ['id' => $menuRootId2, 'title' => 'Footer Menu', 'link' => null]
            ],
        ];
        SeederHelper::setLanguageResource($languageResourceData, 'web_menu', $webMenuLanguage, $languageList, null, false);

        DB::table('language_resource')->insert($languageResourceData);
    }

    protected function insertInboxCategory()
    {
        if (! Schema::hasTable('inbox_category')) {
            return;
        }

        $timestamp = date('Y-m-d H:i:s');
        $languageList = SeederHelper::getLanguageIdList();
        $languageResourceData = [];

        $insertCategoryData = [
            [
                'id' => $categoryId = uuidl(),
                'code' => 'contact',
                'title' => 'inbox_category.title.' . $categoryId,
                'notifiable' => true,
                'bcc' => null,
                'options' => json_encode([
                    'icon' => 'icon-mail-envelope-open text-primary',
                ]),
                'editable' => true,
                'sort' => 1, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
        ];
        DB::table('inbox_category')->insert($insertCategoryData);

        $categoryLanguage = [
            'zh-Hant' => [
                ['id' => $categoryId, 'title' => '聯絡我們']
            ],
            'zh-Hans' => [
                ['id' => $categoryId, 'title' => '联络我们']
            ],
            'ja' => [
                ['id' => $categoryId, 'title' => 'お問い合わせ']
            ],
            'en' => [
                ['id' => $categoryId, 'title' => 'Contact Us']
            ],
        ];
        SeederHelper::setLanguageResource($languageResourceData, 'inbox_category', $categoryLanguage, $languageList, null, false);

        DB::table('language_resource')->insert($languageResourceData);

    }
}
