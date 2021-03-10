<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class AdvertisingIndexSeeder extends Seeder
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
                'value' => 'menu-home',
                'label' => 'system_parameter_item.label.'. ++$rowParameterId,
                'options' => json_encode(['class' => 'secondary', 'details' => null]),
                'sort' => $rowParameterId, 'active' => true
            ],
        ];
        DB::table('system_parameter_item')->insert($systemParameterItemData);
        // 多語系
        $data = [
            ['label' => '首頁群組'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'system_parameter_item', $adTemplateLanguage, $this->languageList, $startParameterId, false);


        $startTemplateId = $rowTemplateId = SeederHelper::getTableNextIncrement('advertising_template');
        $rowTemplateId--;
        $advertisingTemplateData = [

            [
                'title' => 'advertising_template.title.' . $templateId1 = ++$rowTemplateId,
                'code' => 'home_banner',
                'admin_view' => 'MinmaxAd::templates.normal-admin',
                'web_view' => 'templates.web-menu-activity',
                'template_group' => 'menu-manufacturing',
                'options' => null,
                'sort' => $rowTemplateId, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

        ];
        DB::table('advertising_template')->insert($advertisingTemplateData);

        // 多語系
        $data = [
            ['title' => '首頁Banner'],
        ];
        $adTemplateLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_template', $adTemplateLanguage, $this->languageList, $startTemplateId, false);


        $startCategoryId = $rowCategoryId = SeederHelper::getTableNextIncrement('advertising_category');
        $rowCategoryId--;

        $advertisingCategoryData = [

            ['parent_id' => null, 'title' => 'advertising_category.title.' . $parentId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'normal', 'ad_random' =>false, 'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            //['parent_id' => $parentId1, 'title' => 'advertising_category.title.' . $categoryId1 = ++$rowCategoryId, 'details' => 'advertising_category.details.' . $rowCategoryId, 'options' => null, 'template_group' => 'menu-manufacturing', 'ad_random' =>false, 'sort' => 1, 'editable' => false, 'protected' => false, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],


        ];
        DB::table('advertising_category')->insert($advertisingCategoryData);


        // 多語系
        $data = [
            ['title' => '首頁', 'details' => null],

            //['title' => '關於我們Banner', 'details' => null],
        ];

        $adCategoryLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising_category', $adCategoryLanguage, $this->languageList, $startCategoryId, false);

        $timeLimit = \Carbon\Carbon::now()->addDays(14)->format("Y-m-d h:i:s");

        $advertisingData = [
            //banner
            ['id' => $adId1 = uuidl(), 'category_id' => $parentId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId1}", 'details' => "advertising.details.{$adId1}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId2 = uuidl(), 'category_id' => $parentId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId2}", 'details' => "advertising.details.{$adId2}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],
            ['id' => $adId3 = uuidl(), 'category_id' => $parentId1, 'template_id' => $templateId1, 'title' => "advertising.title.{$adId3}", 'details' => "advertising.details.{$adId3}", 'options' => json_encode(['target' => '_self']), 'start_at' => null, 'end_at' => null, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp,],

        ];
        DB::table('advertising')->insert($advertisingData);


        $adEditor1 = <<<HTML
        <div class="text-box">
            <p class="word fs_24">高純度のサケDNAにより、表皮細胞の成長活性を促進し、皮膚のコラーゲン、皮膚の弾力性、およびヒアルロン酸を再生します。</p>
        </div>
HTML;

        $adEditor2 = <<<HTML
        <div class="text-box darkbg">
            <p class="word white fs_24">
                <span class="d-block">免疫医学および自然医学</span>
                <span class="d-block">に関する機能性製品の研究開発</span>
            </p>
        </div>
HTML;

        $adEditor3 = <<<HTML
        <div class="text-box">
            <p class="word white fs_24">修復外用ゲルシリーズ：特に癒しにくい創傷の治癒のために開発され糖尿病や湿疹やニキビによる皮膚の問題を対応できる</p>
        </div>
HTML;


        $data = [
            ['id' => $adId1,'title' => '首頁Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => 'styles/images/index/banner01.jpg']],
                    'topic' => '首頁',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor1
                ]
            ),],

            ['id' => $adId2,'title' => '首頁Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => 'styles/images/index/banner02.jpg']],
                    'topic' => '首頁',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor2
                ]
            ),],

            ['id' => $adId3,'title' => '首頁Banner', 'details' => json_encode(
                [
                    'pic' => [['path' => 'styles/images/index/banner03.jpg']],
                    'topic' => '首頁',
                    'description' => '',
                    'link' => '',
                    'editor' => $adEditor3
                ]
            ),],


        ];
        $advertisingLanguage = [ 'ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'advertising', $advertisingLanguage, $this->languageList, null, false);

    }


    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
