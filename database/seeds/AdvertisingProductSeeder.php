<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class AdvertisingProductSeeder extends Seeder
{
    protected $timestamp,$languageList,$languageResourceData;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->timestamp = date('Y-m-d H:i:s');
        $this->languageList = SeederHelper::getLanguageIdList();
        $this->languageResourceData = [];

        $this->insertData();
        $this->insertLanguageResource();
    }


    protected function insertData(){
        $categoryId = DB::table('system_parameter_group')->where('code', 'ad_template_group')->value('id');

        $startParameterId = $rowParameterId = SeederHelper::getTableNextIncrement('system_parameter_item');
        $rowParameterId--;
        $systemParameterItemData = [
            [
                'group_id' => $categoryId,
                'value' => 'menu-product',
                'label' => 'system_parameter_item.label.'. ++$rowParameterId,
                'options' => json_encode(['class' => 'secondary', 'details' => null]),
                'sort' => $rowParameterId, 'active' => true
            ],



        ];
        DB::table('system_parameter_item')->insert($systemParameterItemData);
        // 多語系
        $data = [
            ['label' => '我們的產品群組'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'system_parameter_item', $adTemplateLanguage, $this->languageList, $startParameterId, false);


        $startTemplateId = $rowTemplateId = SeederHelper::getTableNextIncrement('advertising_template');
        $rowTemplateId--;
        $advertisingTemplateData = [

            //細胞再生
            [
                'title' => 'advertising_template.title.' . $templateId1 = ++$rowTemplateId,
                'code' => 'cellregeneration_banner',
                'admin_view' => 'templates.template-admin-manufacturing-banner',
                'web_view' => 'templates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            [
                'title' => 'advertising_template.title.' . $templateId2 = ++$rowTemplateId,
                'code' => 'cellregeneration',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            //医療美容
            [
                'title' => 'advertising_template.title.' . $templateId3 = ++$rowTemplateId,
                'code' => 'estheticmedicine_banner',
                'admin_view' => 'templates.template-admin-manufacturing-banner',
                'web_view' => 'templates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            [
                'title' => 'advertising_template.title.' . $templateId4 = ++$rowTemplateId,
                'code' => 'estheticmedicine',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            //疾病預防
            [
                'title' => 'advertising_template.title.' . $templateId5 = ++$rowTemplateId,
                'code' => 'diseaseprevention_banner',
                'admin_view' => 'templates.template-admin-manufacturing-banner',
                'web_view' => 'templates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            [
                'title' => 'advertising_template.title.' . $templateId6 = ++$rowTemplateId,
                'code' => 'diseaseprevention',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],


            //治療疾病
            [
                'title' => 'advertising_template.title.' . $templateId7 = ++$rowTemplateId,
                'code' => 'therapeutics_banner',
                'admin_view' => 'templates.template-admin-manufacturing-banner',
                'web_view' => 'templates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

            [
                'title' => 'advertising_template.title.' . $templateId8 = ++$rowTemplateId,
                'code' => 'therapeutics',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-menu-activity',
                'template_group' => 'menu-product',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],




        ];
        DB::table('advertising_template')->insert($advertisingTemplateData);

        // 多語系
        $data = [
            ['title' => '細胞再生-Banner'],
            ['title' => '細胞再生-聯繫我們'],

            ['title' => '醫學美容-Banner'],
            ['title' => '醫學美容-聯繫我們'],

            ['title' => '疾病預防-Banner'],
            ['title' => '疾病預防-聯繫我們'],

            ['title' => '疾病治療-Banner'],
            ['title' => '疾病治療-聯繫我們'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_template', $adTemplateLanguage, $this->languageList, $startTemplateId, false);


        $startCategoryId = $rowCategoryId = SeederHelper::getTableNextIncrement('advertising_category');
        $rowCategoryId--;

        $advertisingCategoryData = [

            ['parent_id' => null, 'title' => 'advertising_category.title.' . $parentId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'normal', 'ad_random' =>false, 'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],



            ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-product', 'ad_random' =>false, 'sort' => 1, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId2 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-product', 'ad_random' =>false, 'sort' => 2, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId3 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-product', 'ad_random' =>false, 'sort' => 3, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId4 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-product', 'ad_random' =>false, 'sort' => 4, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],







        ];
        DB::table('advertising_category')->insert($advertisingCategoryData);


        // 多語系
        $data = [
            ['title' => '我們的產品', 'details' => null],

            ['title' => '細胞再生', 'details' => null],
            ['title' => '醫學美容', 'details' => null],
            ['title' => '疾病預防', 'details' => null],
            ['title' => '疾病治療', 'details' => null],
        ];

        $adCategoryLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_category', $adCategoryLanguage, $this->languageList, $startCategoryId, false);

        //$timeLimit = \Carbon\Carbon::now()->addDays(14)->format("Y-m-d h:i:s");

        $advertisingData = [


            ['id' => $adId1 = uuidl(), 'category_id' => $categoryId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId1}", 'details' => "advertising.details.{$adId1}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId2 = uuidl(), 'category_id' => $categoryId1, 'template_id' => $templateId2, 'title' => "advertising.title.{$adId2}", 'details' => "advertising.details.{$adId2}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

            ['id' => $adId3 = uuidl(), 'category_id' => $categoryId2, 'template_id' => $templateId3, 'title' => "advertising.title.{$adId3}", 'details' => "advertising.details.{$adId3}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId4 = uuidl(), 'category_id' => $categoryId2, 'template_id' => $templateId4, 'title' => "advertising.title.{$adId4}", 'details' => "advertising.details.{$adId4}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

            ['id' => $adId5 = uuidl(), 'category_id' => $categoryId3, 'template_id' => $templateId5, 'title' => "advertising.title.{$adId5}", 'details' => "advertising.details.{$adId5}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId6 = uuidl(), 'category_id' => $categoryId3, 'template_id' => $templateId6, 'title' => "advertising.title.{$adId6}", 'details' => "advertising.details.{$adId6}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

            ['id' => $adId7 = uuidl(), 'category_id' => $categoryId4, 'template_id' => $templateId7, 'title' => "advertising.title.{$adId7}", 'details' => "advertising.details.{$adId7}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId8 = uuidl(), 'category_id' => $categoryId4, 'template_id' => $templateId8, 'title' => "advertising.title.{$adId8}", 'details' => "advertising.details.{$adId8}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

        ];
        DB::table('advertising')->insert($advertisingData);


        $adEditor1 = <<<HTML
        <h1 class="bn-tit fs_36">細胞再生</h1>
        <p class="en fs_16">Cell Regeneration</p>
HTML;


        $adEditor2 = <<<HTML
        <span class="tit fs_28 fw_500" style="color:#413D3C">お問い合わせ</span>
        <span class="subtit fs_16" style="color:#0990D0">Contact</span>
        <span class="text fs_16" style="color:#333333">ご不明な点がございましたら、お気軽にお問い合わせください</span>
HTML;

        $adEditor3 = <<<HTML
        <h1 class="bn-tit fs_36">医療美容</h1>
        <p class="en fs_16">Esthetic Medicine</p>
HTML;

        $adEditor4 = <<<HTML
        <span class="tit fs_28 fw_500" style="color:#413D3C">お問い合わせ</span>
        <span class="subtit fs_16" style="color:#0990D0">Contact</span>
        <span class="text fs_16" style="color:#333333">ご不明な点がございましたら、お気軽にお問い合わせください</span>
HTML;

        $adEditor5 = <<<HTML
        <h1 class="bn-tit fs_36">病気の予防</h1>
        <p class="en fs_16">Disease Prevention</p>
HTML;

        $adEditor6 = <<<HTML
        <span class="tit fs_28 fw_500" style="color:#ffffff">お問い合わせ</span>
        <span class="subtit fs_16" style="color:#0990D0">Contact</span>
        <span class="text fs_16" style="color:#ffffff">ご不明な点がございましたら、お気軽にお問い合わせください</span>
HTML;

        $adEditor7 = <<<HTML
        <h1 class="bn-tit fs_36">疾病の治療</h1>
        <p class="en fs_16">Disease Therapeutics</p>
HTML;

        $adEditor8 = <<<HTML
        <span class="tit fs_28 fw_500" style="color:#413D3C">お問い合わせ</span>
        <span class="subtit fs_16" style="color:#0990D0">Contact</span>
        <span class="text fs_16" style="color:#333333">ご不明な点がございましたら、お気軽にお問い合わせください</span>
HTML;








        $data = [
            ['id' => $adId1,'title' => '細胞再生Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'pic2' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'topic' => '細胞再生',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor1
                ]
            ),],

            ['id' => $adId2,'title' => 'お問い合わせ', 'details' => json_encode(['pic' => [['path' => '/styles/images/product/cell-contact.jpg']], 'topic' => 'お問い合わせ', 'description' => '', 'link' => 'contact','editor' => $adEditor2]),],


            ['id' => $adId3,'title' => '醫學美容Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'pic2' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'topic' => '醫學美容',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor3
                ]
            ),],

            ['id' => $adId4,'title' => 'お問い合わせ', 'details' => json_encode(['pic' => [['path' => '/styles/images/product/cell-contact.jpg']], 'topic' => 'お問い合わせ', 'description' => '', 'link' => 'contact','editor' => $adEditor4]),],



            ['id' => $adId5,'title' => '疾病預防Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'pic2' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'topic' => '疾病預防',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor5
                ]
            ),],

            ['id' => $adId6,'title' => 'お問い合わせ', 'details' => json_encode(['pic' => [['path' => '/styles/images/product/cell-contact.jpg']], 'topic' => 'お問い合わせ', 'description' => '', 'link' => 'contact','editor' => $adEditor6]),],



            ['id' => $adId7,'title' => '疾病治療Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'pic2' => [['path' => '/styles/images/product/cell-banner.jpg']],
                    'topic' => '疾病治療',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor7
                ]
            ),],

            ['id' => $adId8,'title' => 'お問い合わせ', 'details' => json_encode(['pic' => [['path' => '/styles/images/product/cell-contact.jpg']], 'topic' => 'お問い合わせ', 'description' => '', 'link' => 'contact','editor' => $adEditor8]),],

        ];
        $advertisingLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising', $advertisingLanguage, $this->languageList, null, false);

    }


    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }


}
