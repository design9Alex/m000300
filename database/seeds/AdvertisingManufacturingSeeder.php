<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class AdvertisingManufacturingSeeder extends Seeder
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
                'value' => 'menu-manufacturing',
                'label' => 'system_parameter_item.label.'. ++$rowParameterId,
                'options' => json_encode(['class' => 'secondary', 'details' => null]),
                'sort' => $rowParameterId, 'active' => true
            ],



        ];
        DB::table('system_parameter_item')->insert($systemParameterItemData);
        // 多語系
        $data = [
            ['label' => '醫學研究與製造群組'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'system_parameter_item', $adTemplateLanguage, $this->languageList, $startParameterId, false);


        $startTemplateId = $rowTemplateId = SeederHelper::getTableNextIncrement('advertising_template');
        $rowTemplateId--;
        $advertisingTemplateData = [
            [
                'title' => 'advertising_template.title.' . $templateId1 = ++$rowTemplateId,
                'code' => 'manufacturing1',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-menu-activity',
                'template_group' => 'menu-manufacturing',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],
            [
                'title' => 'advertising_template.title.' . $templateId2 = ++$rowTemplateId,
                'code' => 'manufacturing2',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'adTemplates.web-index-gallery',
                'template_group' => 'menu-manufacturing',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],


        ];
        DB::table('advertising_template')->insert($advertisingTemplateData);

        // 多語系
        $data = [
            ['title' => '醫學研究與製造版型1'],
            ['title' => '醫學研究與製造版型2'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_template', $adTemplateLanguage, $this->languageList, $startTemplateId, false);


        $startCategoryId = $rowCategoryId = SeederHelper::getTableNextIncrement('advertising_category');
        $rowCategoryId--;

        $advertisingCategoryData = [

            ['parent_id' => null, 'title' => 'advertising_category.title.' . $parentId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'normal', 'ad_random' =>false, 'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
                ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-manufacturing', 'ad_random' =>false, 'sort' => 1, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
                ['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId2 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-manufacturing', 'ad_random' =>false, 'sort' => 2, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

        ];
        DB::table('advertising_category')->insert($advertisingCategoryData);


        // 多語系
        $data = [
            ['title' => '醫學研究與製造', 'details' => null],
            ['title' => '廣告A', 'details' => null],
            ['title' => '廣告B', 'details' => null],
        ];

        $adCategoryLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_category', $adCategoryLanguage, $this->languageList, $startCategoryId, false);

        $timeLimit = \Carbon\Carbon::now()->addDays(14)->format("Y-m-d h:i:s");

        $advertisingData = [
            ['id' => $adId1 = uuidl(), 'category_id' => $categoryId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId1}", 'details' => "advertising.details.{$adId1}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId2 = uuidl(), 'category_id' => $categoryId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId2}", 'details' => "advertising.details.{$adId2}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

            ['id' => $adId3 = uuidl(), 'category_id' => $categoryId2, 'template_id' => $templateId2, 'title' => "advertising.title.{$adId3}", 'details' => "advertising.details.{$adId3}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

        ];
        DB::table('advertising')->insert($advertisingData);


        $adEditor1 = <<<HTML
        <span class="pd-data" data-aos="fade">
            <span class="tit fs_24 fw_bold">革新的な医療食品</span>
            <span class="subtit fw_bold">
                <span class="fs_20">スプレー方法</span>
                <span class="icon"><img class="svg" src="styles/images/common/icon-arrow-right-lightblue.svg" alt="arrow"></span>
            </span>
            <span class="text fs_16">粘膜はすぐに吸収される   *医療機関限定</span>
        </span>
HTML;

        $adEditor2 = <<<HTML
        <span class="pd-data" data-aos="fade">
            <span class="tit fs_24 fw_bold">革新的な医療食品</span>
            <span class="subtit fw_bold">
                <span class="fs_20">健康補助カプセル</span>
                <span class="icon"><img class="svg" src="styles/images/common/icon-arrow-right-lightblue.svg" alt="arrow"></span>
            </span>
            <span class="text fs_16">医療機関で使用するために特別に開発されました</span>
        </span>
HTML;

        $adEditor3 = <<<HTML
        <span class="pd-data">
            <span class="tit fs_36 fw_500">ヘルスケア製品</span>
            <span class="subtit fs_16">Products</span>
            <span class="text fs_16">さらに優れた医薬品の研究開発と製造能力を卓越します</span>
        </span>
HTML;


        $data = [
            ['id' => $adId1,'title' => '革新的な医療食品', 'details' =>json_encode(['pic' => [['path' => '/styles/images/manufacturing/pd-ad-01.png']], 'topic' => '革新的な医療食品', 'description' => '', 'link' => 'diseaseprevention#pdsection-02','editor' => $adEditor1]),],
            ['id' => $adId2,'title' => '革新的な医療食品', 'details' => json_encode(['pic' => [['path' => '/styles/images/manufacturing/pd-ad-02.png']], 'topic' => '革新的な医療食品', 'description' => '', 'link' => 'estheticmedicine#pdsection-05','editor' => $adEditor2]),],

            ['id' => $adId3,'title' => 'ヘルスケア製品', 'details' => json_encode(['pic' => [['path' => '/styles/images/manufacturing/pd-ad-03.png']], 'topic' => 'ヘルスケア製品', 'description' => '', 'link' => 'diseaseprevention#pdsection-01','editor' => $adEditor3]),],

        ];
        $advertisingLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising', $advertisingLanguage, $this->languageList, null, false);

    }


    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
