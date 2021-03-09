<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementSeeder extends Seeder
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

        $this->systemUpdate();
        $this->insertData();

        $this->insertLanguageResource();
    }

    protected function systemUpdate(){
        //調整欄位
        DB::table('article_category')->where('uri','article-element')->update(['options' => json_encode(['relation' => 'articleElement', 'route' => false])]);

        //刪除不須要的擴充欄位
        //$columnKeys = DB::table('column_extension')->where('table_name','article_element')->whereIn('sub_column_name',['pic','description'])->get()->pluck('title')->toArray();
        //DB::table('language_resource')->whereIn('key',$columnKeys)->delete();
        //DB::table('column_extension')->where('table_name','article_element')->whereIn('sub_column_name',['pic','description'])->delete();
    }

    protected function insertData(){
        $categoryId = DB::table('article_category')->where('uri', 'article-element')->value('id');

        //新增類別
        $articleCategoryData = [
            [
                'id' => $categoryId1 = uuidl(),
                'uri' => 'index',
                'parent_id' => $categoryId,
                'title' => "article_category.title.{$categoryId1}",
                'details' => "article_category.details.{$categoryId1}",
                'options' => null,
                'seo' => "article_category.seo.{$categoryId1}",
                'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],
            [
                'id' => $categoryId2 = uuidl(),
                'uri' => 'about',
                'parent_id' => $categoryId,
                'title' => "article_category.title.{$categoryId2}",
                'details' => "article_category.details.{$categoryId2}",
                'options' => null,
                'seo' => "article_category.seo.{$categoryId2}",
                'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],
            [
                'id' => $categoryId3 = uuidl(),
                'uri' => 'manufacturing_and_research',
                'parent_id' => $categoryId,
                'title' => "article_category.title.{$categoryId3}",
                'details' => "article_category.details.{$categoryId3}",
                'options' => null,
                'seo' => "article_category.seo.{$categoryId3}",
                'sort' => 3, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],
                [
                    'id' => $categoryId3_1 = uuidl(),
                    'uri' => 'manufacturing',
                    'parent_id' => $categoryId3,
                    'title' => "article_category.title.{$categoryId3_1}",
                    'details' => "article_category.details.{$categoryId3_1}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId3_1}",
                    'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],
                [
                    'id' => $categoryId3_2 = uuidl(),
                    'uri' => 'research',
                    'parent_id' => $categoryId3,
                    'title' => "article_category.title.{$categoryId3_2}",
                    'details' => "article_category.details.{$categoryId3_2}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId3_2}",
                    'sort' => 2, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],

            [
                'id' => $categoryId4 = uuidl(),
                'uri' => 'cellregenerations',
                'parent_id' => $categoryId,
                'title' => "article_category.title.{$categoryId4}",
                'details' => "article_category.details.{$categoryId4}",
                'options' => null,
                'seo' => "article_category.seo.{$categoryId4}",
                'sort' => 4, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],
                [
                    'id' => $categoryId4_1 = uuidl(),
                    'uri' => 'cellregeneration',
                    'parent_id' => $categoryId4,
                    'title' => "article_category.title.{$categoryId4_1}",
                    'details' => "article_category.details.{$categoryId4_1}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId4_1}",
                    'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],
                [
                    'id' => $categoryId4_2 = uuidl(),
                    'uri' => 'estheticmedicine',
                    'parent_id' => $categoryId4,
                    'title' => "article_category.title.{$categoryId4_2}",
                    'details' => "article_category.details.{$categoryId4_2}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId4_2}",
                    'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],
                [
                    'id' => $categoryId4_3 = uuidl(),
                    'uri' => 'diseaseprevention',
                    'parent_id' => $categoryId4,
                    'title' => "article_category.title.{$categoryId4_3}",
                    'details' => "article_category.details.{$categoryId4_3}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId4_3}",
                    'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],
                [
                    'id' => $categoryId4_4 = uuidl(),
                    'uri' => 'therapeutics',
                    'parent_id' => $categoryId4,
                    'title' => "article_category.title.{$categoryId4_4}",
                    'details' => "article_category.details.{$categoryId4_4}",
                    'options' => null,
                    'seo' => "article_category.seo.{$categoryId4_4}",
                    'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
                ],

        ];
        DB::table('article_category')->insert($articleCategoryData);

        // 多語系
        $data = [
            ['id' => $categoryId1, 'title' => '首頁', 'details' => null],
            ['id' => $categoryId2, 'title' => '關於我們', 'details' => null],
            ['id' => $categoryId3, 'title' => '醫學研究與製造', 'details' => null],
                ['id' => $categoryId3_1, 'title' => '製造與開發', 'details' => null],
                ['id' => $categoryId3_2, 'title' => ' 醫學研究', 'details' => null],
            ['id' => $categoryId4, 'title' => '我們的產品', 'details' => null],
                ['id' => $categoryId4_1, 'title' => '細胞再生', 'details' => null],
                ['id' => $categoryId4_2, 'title' => '醫學美容', 'details' => null],
                ['id' => $categoryId4_3, 'title' => '疾病預防', 'details' => null],
                ['id' => $categoryId4_4, 'title' => '治療疾病', 'details' => null],
        ];
        $articleCategoryLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_category', $articleCategoryLanguage, $this->languageList, null, false);



    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
