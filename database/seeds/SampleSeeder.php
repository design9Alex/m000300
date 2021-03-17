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

        $systemParameters = DB::table('language_resource')->where('key','like','%site_dashboard.title.%')->where('language_id','1')->get();

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
                'details' => 'web_menu.details.' . $menuRootId1,
                'uri' => 'root-header',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => null,
                'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],


            [

                'id' => $menuId0 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId0,
                'details' => 'web_menu.details.' . $menuId0,
                'uri' => 'index',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 1, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],

            [

                'id' => $menuId1 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId1,
                'details' => 'web_menu.details.' . $menuId1,
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
                'details' => 'web_menu.details.' . $menuId2,
                'uri' => 'manufacturings',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 2, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],

                [
                    'id' => $menuId2_1 = uuidl(),
                    'parent_id' => $menuId2,
                    'title' => 'web_menu.title.' . $menuId2_1,
                    'details' => 'web_menu.details.' . $menuId2_1,
                    'uri' => 'manufacturing',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 1, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],
                [
                    'id' => $menuId2_2 = uuidl(),
                    'parent_id' => $menuId2,
                    'title' => 'web_menu.title.' . $menuId2_2,
                    'details' => 'web_menu.details.' . $menuId2_2,
                    'uri' => 'research',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 2, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],

            [
                'id' => $menuId3 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId3,
                'details' => 'web_menu.details.' . $menuId3,
                'uri' => 'cellregenerations',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 3, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
                [
                    'id' => $menuId3_1 = uuidl(),
                    'parent_id' => $menuId3,
                    'title' => 'web_menu.title.' . $menuId3_1,
                    'details' => 'web_menu.details.' . $menuId3_1,
                    'uri' => 'cellregeneration',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 1, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],
                [
                    'id' => $menuId3_2 = uuidl(),
                    'parent_id' => $menuId3,
                    'title' => 'web_menu.title.' . $menuId3_2,
                    'details' => 'web_menu.details.' . $menuId3_2,
                    'uri' => 'estheticmedicine',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 2, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],
                [
                    'id' => $menuId3_3 = uuidl(),
                    'parent_id' => $menuId3,
                    'title' => 'web_menu.title.' . $menuId3_3,
                    'details' => 'web_menu.details.' . $menuId3_3,
                    'uri' => 'diseaseprevention',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 3, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],
                [
                    'id' => $menuId3_4 = uuidl(),
                    'parent_id' => $menuId3,
                    'title' => 'web_menu.title.' . $menuId3_4,
                    'details' => 'web_menu.details.' . $menuId3_4,
                    'uri' => 'therapeutics',
                    'controller' => null,
                    'model' => null,
                    'permission_key' => null,
                    'options' => json_encode(['target' => '_self']),
                    'sort' => 4, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
                ],

            [
                'id' => $menuId4 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId4,
                'details' => 'web_menu.details.' . $menuId4,
                'uri' => 'contact',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 4, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],


            [
                'id' => $footerId = uuidl(),
                'parent_id' => null,
                'title' => 'web_menu.title.' . $footerId,
                'details' => 'web_menu.details.' . $footerId,
                'uri' => 'root-footer',
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => null,
                'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
        ];

        DB::table('web_menu')->insert($insertWebMenuData);

        $editor0 = <<<HTML
HTML;

        $editor1 = <<<HTML
        <h1 class="bn-tit fs_36">会社案内</h1>
        <p class="en fs_16">About Us</p>
HTML;

        $editor2_1 = <<<HTML
        <h1 class="bn-tit fs_36">製造と開発</h1>
                    <p class="en fs_16">Manufacturing and Development</p>
HTML;

        $editor2_2 = <<<HTML
        <h1 class="bn-tit fs_36">医学研究</h1>
            <p class="en fs_16">Medical Research</p>
HTML;

        $editor3_1 = <<<HTML
 <h1 class="bn-tit fs_36">細胞再生</h1>
        <p class="en fs_16">Cell Regeneration</p>
HTML;

        $editor3_2 = <<<HTML
<h1 class="bn-tit fs_36">医療美容</h1>
        <p class="en fs_16">Esthetic Medicine</p>
HTML;

        $editor3_3 = <<<HTML
<h1 class="bn-tit fs_36">病気の予防</h1>
        <p class="en fs_16">Disease Prevention</p>
HTML;

        $editor3_4 = <<<HTML
<h1 class="bn-tit fs_36">疾病の治療</h1>
        <p class="en fs_16">Disease Therapeutics</p>
HTML;

        $editor4 = <<<HTML
        <h1 class="bn-tit fs_36">お問い合わせ</h1>
         <p class="en fs_16">Contact Us</p>
HTML;


        $webMenuLanguage = [

            'ja' => [
                ['id' => $menuRootId1, 'title' => '網站主選單', 'link' => null],
                ['id' => $menuId1, 'title' => '私たちについて', 'link' => url('about') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/about/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/about/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '關於我們',
                        'description' => '',
                        'link' => '/about',
                        'editor' => $editor1
                    ]
                ),],
                ['id' => $menuId2, 'title' => '医学研究および製造', 'link' => url('manufacturing')],
                    ['id' => $menuId2_1, 'title' => '製造と開発', 'link' => url('manufacturing') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '製造與開發',
                            'description' => '',
                            'link' => '/manufacturing',
                            'editor' => $editor2_1
                        ]
                    ),],
                    ['id' => $menuId2_2, 'title' => '医学研究', 'link' => url('research') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/research/banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/research/banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '醫學研究',
                            'description' => '',
                            'link' => '/research',
                            'editor' => $editor2_2
                        ]
                    ),],



                ['id' => $menuId3, 'title' => '私たちの製品', 'link' => url('products/cellregeneration')],

                    ['id' => $menuId3_1, 'title' => '細胞再生', 'link' => url('products/cellregeneration') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/cell-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/cell-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '細胞再生',
                            'description' => '',
                            'link' => url('products/cellregeneration'),
                            'editor' => $editor3_1
                        ]
                    ),],
                    ['id' => $menuId3_2, 'title' => '医療美容', 'link' => url('products/estheticmedicine') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '医療美容',
                            'description' => '',
                            'link' => url('products/estheticmedicine'),
                            'editor' => $editor3_2
                        ]
                    ),],
                    ['id' => $menuId3_3, 'title' => '病気の予防', 'link' => url('products/diseaseprevention') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/disease-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/disease-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '病気の予防',
                            'description' => '',
                            'link' => url('products/diseaseprevention'),
                            'editor' => $editor3_3
                        ]
                    ),],
                    ['id' => $menuId3_4, 'title' => '疾病の治療', 'link' => url('products/therapeutics') , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '疾病の治療',
                            'description' => '',
                            'link' => url('products/therapeutics'),
                            'editor' => $editor3_4
                        ]
                    ),],

                ['id' => $menuId4, 'title' => 'お問い合わせ', 'link' => url('contact') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '聯繫我們',
                        'description' => '',
                        'link' => '/contact',
                        'editor' => $editor4
                    ]
                ),],

                ['id' => $footerId, 'title' => '頁尾選單', 'link' => null]
            ],
            'en' => [
                ['id' => $menuRootId1, 'title' => '網站主選單', 'link' => null],
                ['id' => $menuId1, 'title' => '私たちについて', 'link' => url('about') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/about/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/about/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '關於我們',
                        'description' => '',
                        'link' => '/about',
                        'editor' => $editor1
                    ]
                ),],
                ['id' => $menuId2, 'title' => '医学研究および製造', 'link' => url('manufacturing')],
                ['id' => $menuId2_1, 'title' => '製造と開発', 'link' => url('manufacturing') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '製造與開發',
                        'description' => '',
                        'link' => '/manufacturing',
                        'editor' => $editor2_1
                    ]
                ),],
                ['id' => $menuId2_2, 'title' => '医学研究', 'link' => url('research') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/research/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/research/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '醫學研究',
                        'description' => '',
                        'link' => '/research',
                        'editor' => $editor2_2
                    ]
                ),],



                ['id' => $menuId3, 'title' => '私たちの製品', 'link' => url('products/cellregeneration')],

                ['id' => $menuId3_1, 'title' => '細胞再生', 'link' => url('products/cellregeneration') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/cell-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/cell-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '細胞再生',
                        'description' => '',
                        'link' => url('products/cellregeneration'),
                        'editor' => $editor3_1
                    ]
                ),],
                ['id' => $menuId3_2, 'title' => '医療美容', 'link' => url('products/estheticmedicine') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '医療美容',
                        'description' => '',
                        'link' => url('products/estheticmedicine'),
                        'editor' => $editor3_2
                    ]
                ),],
                ['id' => $menuId3_3, 'title' => '病気の予防', 'link' => url('products/diseaseprevention') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/disease-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/disease-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '病気の予防',
                        'description' => '',
                        'link' => url('products/diseaseprevention'),
                        'editor' => $editor3_3
                    ]
                ),],
                ['id' => $menuId3_4, 'title' => '疾病の治療', 'link' => url('products/therapeutics') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '疾病の治療',
                        'description' => '',
                        'link' => url('products/therapeutics'),
                        'editor' => $editor3_4
                    ]
                ),],

                ['id' => $menuId4, 'title' => 'お問い合わせ', 'link' => url('about') , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '聯繫我們',
                        'description' => '',
                        'link' => '/contact',
                        'editor' => $editor4
                    ]
                ),],

                ['id' => $footerId, 'title' => '頁尾選單', 'link' => null]
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
