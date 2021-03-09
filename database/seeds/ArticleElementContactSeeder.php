<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementContactSeeder extends Seeder
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
        $categoryId5 = DB::table('article_category')->where('uri', 'contact')->value('id');


        //新增資料
        $articleElementData = [

            //細胞再生 cellregeneration
            ['id' => $articleElementId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementId1, 'details' => 'article_element.details.'.$articleElementId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementId2, 'details' => 'article_element.details.'.$articleElementId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],


        ];
        DB::table('article_element')->insert($articleElementData);

        $editor1 = <<<HTML
        <h2 class="tag darkgray fs_24 fw_bold">ご不明な点やご要望がございましたら、<br/>下記フォームよりお気軽にお問い合わせください</h2>
        <div class="notice">
            <p class="fs_16 text-center">以下のフォーラムに必要な情報を入力し、「送信」ボタンをクリックしてください。また当社はＳＳＬで保護されたメールフォームを使用して、個人情報を守ります。個人情報の取り扱いについては<a href="privacy">「プライバシーポリシー」</a>を参照してください。<br/>*【必須】の項目は必ずご入力ください</p>
        </div>
HTML;

        $editor2 = <<<HTML
        <p class="text fs_16 text-center">送信により、当社のプライバシー声明に従う情報の取り扱いを同意することです。当社は定期的に関連な情報を配信いたします。また、配信停止希望の場合は <a href="mailto:info@dag-regen.com" class="">info@dag-regen.com </a>にご連絡ください。</p>
HTML;




        $data = [
            ['id' => $articleElementId1, 'title' => 'ご不明な点やご要望がございましたら','details' => json_encode(['editor' => $editor1])],
            ['id' => $articleElementId2, 'title' => '提交即表示','details' => json_encode(['editor' => $editor2])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId5, 'object_id' => $articleElementId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId5, 'object_id' => $articleElementId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
