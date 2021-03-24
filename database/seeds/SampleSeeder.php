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

        $this->updateInboxReceived();

        $this->updateLanguageResource();

        $this->insertWebMenu();

        $this->insertNotifyEmail();

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


    protected function updateInboxReceived(){
        DB::statement("ALTER TABLE `inbox_received` MODIFY COLUMN `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '內容' AFTER `subject`;");
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
                'link' => 'web_menu.link.' . $menuRootId1,
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
                'details' => 'web_menu.details.' . $menuId1,
                'uri' => 'about',
                'link' => 'web_menu.link.' . $menuId1,
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
                'link' => 'web_menu.link.' . $menuId2,
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
                    'link' => 'web_menu.link.' . $menuId2_1,
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
                    'link' => 'web_menu.link.' . $menuId2_2,
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
                'link' => 'web_menu.link.' . $menuId3,
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
                    'link' => 'web_menu.link.' . $menuId3_1,
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
                    'link' => 'web_menu.link.' . $menuId3_2,
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
                    'link' => 'web_menu.link.' . $menuId3_3,
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
                    'link' => 'web_menu.link.' . $menuId3_4,
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
                'link' => 'web_menu.link.' . $menuId4,
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 4, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],

            [
                'id' => $menuId5 = uuidl(),
                'parent_id' => $menuRootId1,
                'title' => 'web_menu.title.' . $menuId5,
                'details' => 'web_menu.details.' . $menuId5,
                'uri' => 'privacy',
                'link' => 'web_menu.link.' . $menuId5,
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => json_encode(['target' => '_self']),
                'sort' => 5, 'editable' => true, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],

            /*
            [
                'id' => $footerId = uuidl(),
                'parent_id' => null,
                'title' => 'web_menu.title.' . $footerId,
                'details' => 'web_menu.details.' . $footerId,
                'uri' => 'root-footer',
                'link' => 'web_menu.link.' . $footerId,
                'controller' => null,
                'model' => null,
                'permission_key' => null,
                'options' => null,
                'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $timestamp, 'updated_at' => $timestamp
            ],
            */
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

        $editor5 = <<<HTML
        <h1 class="bn-tit fs_36">プライバシーポリシー</h1>
                <p class="en fs_16">Privacy Policy</p>
HTML;


        $webMenuLanguage = [

            'ja' => [
                ['id' => $menuRootId1, 'title' => '網站主選單', 'link' => null],
                ['id' => $menuId1, 'title' => '私たちについて', 'link' => '/about' , 'details' => json_encode(
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
                ['id' => $menuId2, 'title' => '医学研究および製造', 'link' => '/manufacturing'],
                    ['id' => $menuId2_1, 'title' => '製造と開発', 'link' => '/manufacturing' , 'details' => json_encode(
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
                    ['id' => $menuId2_2, 'title' => '医学研究', 'link' => '/research' , 'details' => json_encode(
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



                ['id' => $menuId3, 'title' => '私たちの製品', 'link' => '/products/cellregeneration'],

                    ['id' => $menuId3_1, 'title' => '細胞再生', 'link' => '/products/cellregeneration' , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/cell-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/cell-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '細胞再生',
                            'description' => '',
                            'link' => '/products/cellregeneration',
                            'editor' => $editor3_1
                        ]
                    ),],
                    ['id' => $menuId3_2, 'title' => '医療美容', 'link' => '/products/estheticmedicine' , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '医療美容',
                            'description' => '',
                            'link' => '/products/estheticmedicine',
                            'editor' => $editor3_2
                        ]
                    ),],
                    ['id' => $menuId3_3, 'title' => '病気の予防', 'link' => '/products/diseaseprevention' , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/disease-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/disease-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '病気の予防',
                            'description' => '',
                            'link' => '/products/diseaseprevention',
                            'editor' => $editor3_3
                        ]
                    ),],
                    ['id' => $menuId3_4, 'title' => '疾病の治療', 'link' => '/products/therapeutics' , 'details' => json_encode(
                        [
                            'pic' => [
                                ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'desktop'],
                                ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'mobile'],
                            ],
                            'topic' => '疾病の治療',
                            'description' => '',
                            'link' => '/products/therapeutics',
                            'editor' => $editor3_4
                        ]
                    ),],

                ['id' => $menuId4, 'title' => 'お問い合わせ', 'link' => '/contact' , 'details' => json_encode(
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


                ['id' => $menuId5, 'title' => 'プライバシーポリシー', 'link' => '/privacy' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/other/privacy-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/other/privacy-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '隱私政策',
                        'description' => '',
                        'link' => '/privacy',
                        'editor' => $editor5
                    ]
                ),],



                //['id' => $footerId, 'title' => '頁尾選單', 'link' => null]
            ],

            'en' => [
                ['id' => $menuRootId1, 'title' => '網站主選單', 'link' => null],
                ['id' => $menuId1, 'title' => '私たちについて', 'link' => '/en/about' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/about/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/about/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '關於我們',
                        'description' => '',
                        'link' => '/en/about',
                        'editor' => $editor1
                    ]
                ),],
                ['id' => $menuId2, 'title' => '医学研究および製造', 'link' => '/en/manufacturing'],
                ['id' => $menuId2_1, 'title' => '製造と開発', 'link' => '/en/manufacturing' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/manufacturing/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '製造與開發',
                        'description' => '',
                        'link' => '/en/manufacturing',
                        'editor' => $editor2_1
                    ]
                ),],
                ['id' => $menuId2_2, 'title' => '医学研究', 'link' => '/en/research' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/research/banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/research/banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '醫學研究',
                        'description' => '',
                        'link' => '/en/research',
                        'editor' => $editor2_2
                    ]
                ),],



                ['id' => $menuId3, 'title' => '私たちの製品', 'link' => '/en/products/cellregeneration'],

                ['id' => $menuId3_1, 'title' => '細胞再生', 'link' => '/en/products/cellregeneration' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/cell-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/cell-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '細胞再生',
                        'description' => '',
                        'link' => '/en/products/cellregeneration',
                        'editor' => $editor3_1
                    ]
                ),],
                ['id' => $menuId3_2, 'title' => '医療美容', 'link' => '/en/products/estheticmedicine' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/medicine-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '医療美容',
                        'description' => '',
                        'link' => '/en/products/estheticmedicine',
                        'editor' => $editor3_2
                    ]
                ),],
                ['id' => $menuId3_3, 'title' => '病気の予防', 'link' => '/en/products/diseaseprevention' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/disease-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/disease-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '病気の予防',
                        'description' => '',
                        'link' => '/en/products/diseaseprevention',
                        'editor' => $editor3_3
                    ]
                ),],
                ['id' => $menuId3_4, 'title' => '疾病の治療', 'link' => '/en/products/therapeutics' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/product/therapeutics-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '疾病の治療',
                        'description' => '',
                        'link' => '/en/products/therapeutics',
                        'editor' => $editor3_4
                    ]
                ),],

                ['id' => $menuId4, 'title' => 'お問い合わせ', 'link' => '/en/contact' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/other/contact-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '聯繫我們',
                        'description' => '',
                        'link' => '/en/contact',
                        'editor' => $editor4
                    ]
                ),],


                ['id' => $menuId5, 'title' => 'プライバシーポリシー', 'link' => '/en/privacy' , 'details' => json_encode(
                    [
                        'pic' => [
                            ['path' => '/styles/images/other/privacy-banner.jpg','device' => 'desktop'],
                            ['path' => '/styles/images/other/privacy-banner.jpg','device' => 'mobile'],
                        ],
                        'topic' => '隱私政策',
                        'description' => '',
                        'link' => '/en/privacy',
                        'editor' => $editor5
                    ]
                ),],



                ['id' => $footerId, 'title' => '頁尾選單', 'link' => null]
            ],
        ];
        SeederHelper::setLanguageResource($languageResourceData, 'web_menu', $webMenuLanguage, $languageList, null, false);

        DB::table('language_resource')->insert($languageResourceData);
    }



    protected function insertNotifyEmail()
    {
        $timestamp = date('Y-m-d H:i:s');
        $languageList = SeederHelper::getLanguageIdList();
        $languageResourceData = [];

        DB::table('notify_email')->where('code','contact-received')->delete();

        $templateCustomEditorReceived = view('editorDemo.contact.mail-custom')->render();
        $templateAdminEditorReceived = view('editorDemo.contact.mail-admin')->render();

        $receivers = [];
        if ($webData = DB::table('web_data')->where('guard', 'web')->first()) {
            $receivers[] = "web_data.system_email.{$webData->id}";
            $receivers[] = "web_data.contact.{$webData->id}.email";
        }
        foreach (DB::table('admin')->where('username', '!=', 'sysadmin')->get() as $adminData) {
            $receivers[] = "admin.email.{$adminData->id}";
        }

        $emailServiceId = DB::table('service_config')->where('code', 'smtp')->value('id');
        $startNotifyEmailId = $rowNotifyEmailId = SeederHelper::getTableNextIncrement('notify_email');
        $rowNotifyEmailId--;
        $insertNotifyEmailData = [
            [
                'code' => 'contact-received',
                'title' => 'notify_email.title.' . ++$rowNotifyEmailId,
                'service_id' => $emailServiceId,
                'notifiable' => true,
                'receivers' => json_encode($receivers),
                'custom_subject' => 'notify_email.custom_subject.' . $rowNotifyEmailId,
                'custom_preheader' => 'notify_email.custom_preheader.' . $rowNotifyEmailId,
                'custom_editor' => 'notify_email.custom_editor.' . $rowNotifyEmailId,
                'custom_mailable' => '\App\Mail\ContactCMail',
                'admin_subject' => 'notify_email.admin_subject.' . $rowNotifyEmailId,
                'admin_preheader' => 'notify_email.admin_preheader.' . $rowNotifyEmailId,
                'admin_editor' => 'notify_email.admin_editor.' . $rowNotifyEmailId,
                'admin_mailable' => '\App\Mail\ContactAMail',
                'replacements' => 'notify_email.replacements.' . $rowNotifyEmailId,
                'queueable' => false,
                'sort' => 50,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ];
        DB::table('notify_email')->insert($insertNotifyEmailData);

        $langData = [
            [
                'title' => '客服中心',
                'custom_subject' => '感謝您的來信',
                'custom_preheader' => '我們已經收到您透過聯絡表單的來信。',
                'custom_editor' => $templateCustomEditorReceived,
                'admin_subject' => '客服信件通知',
                'admin_preheader' => '您有一封客服信件，請儘速處理回覆。',
                'admin_editor' => $templateAdminEditorReceived,
                'replacements' => json_encode([
                    'serial' => '案件單號',
                    'formDate' => '來信日期',

                    'formServiceItem' => '諮詢服務',
                    'formParticipation' => '參加類別',
                    'formCountry' => '國家',
                    'formCompany' => '公司',
                    'formTitle' => '標題',
                    'formFirstName' => '姓',
                    'formLastName' => '名',
                    'formAreacode' => '區碼',
                    'formTel' => '電話',
                    'formEmail' => 'email',
                    'formContactItem' => '產品',

                    'receivedUrl' => '案件後臺路徑',
                    'websitePhone' => '客服電話',
                    'websiteEmail' => '客服信箱',
                    'websiteName' => '網站名稱',
                    'websiteUrl' => '網站網址'
                ])
            ]
        ];
        // 多語系
        $notifyEmailLanguage = ['ja' => $langData, 'en' => $langData,];
        SeederHelper::setLanguageResource($languageResourceData, 'notify_email', $notifyEmailLanguage, $languageList, $startNotifyEmailId, false);
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
