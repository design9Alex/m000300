<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticlePagePrivacySeeder extends Seeder
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
        // 欄位擴充
        DB::table('column_extension')->where('table_name','article_page')->where('sub_column_name','pic')->update(['options' => json_encode(['method' => 'getFieldMediaImage', 'hint' => '建議尺寸：1920px * 540px。圖片類型：jpg、png、gif。','limit' => 1])]);

        $startExtensionId = $extensionRowId = SeederHelper::getTableNextIncrement('column_extension');

        $columnExtensionData = [
            ['table_name' => 'article_page', 'column_name' => 'details', 'sub_column_name' => 'pic2', 'sort' => 3, 'active' => true,
                'title' => '手機版圖片', 'options' => json_encode(['method' => 'getFieldMediaImage','hint' => '建議尺寸：768px * 768px。圖片類型：jpg、png、gif。','limit' => 1])],
        ];
        SeederHelper::setLanguageExchange($columnExtensionData, $this->languageResourceData, 'column_extension', 'title', $this->languageList, $startExtensionId);
        DB::table('column_extension')->insert($columnExtensionData);




        $categoryId = DB::table('article_category')->where('uri', 'article-page')->value('id');

        //新增類別
        $articleCategoryData = [
            [
                'id' => $categoryId1 = uuidl(),
                'uri' => 'privacy',
                'parent_id' => $categoryId,
                'title' => "article_category.title.{$categoryId1}",
                'details' => "article_category.details.{$categoryId1}",
                'options' => null,
                'seo' => "article_category.seo.{$categoryId1}",
                'sort' => 1, 'editable' => false, 'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],



        ];
        DB::table('article_category')->insert($articleCategoryData);

        // 多語系
        $data = [
            ['id' => $categoryId1, 'title' => '隱私政策', 'details' => null],
        ];
        $articleCategoryLanguage = ['ja' => $data, 'en' => $data,];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_category', $articleCategoryLanguage, $this->languageList, null, false);



        $pageData = [
            [
                'id' => $pageId1 = uuidl(),
                'uri' => 'privacy',
                'title' => "article_page.title.{$pageId1}",
                'details' => "article_page.details.{$pageId1}",
                //'page_wrap' => 'default',
                'start_at' => null, 'end_at' => null,
                'seo' => "article_page.seo.{$pageId1}",
                'sort' => 1,
                'protected' => true, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp
            ],

        ];
        \DB::table('article_page')->insert($pageData);

        $editor1 = <<<HTML
        <h2 class="tag darkgray fs_28 fw_bold" data-aos="fade-up">免責事項</h2>
                        <div class="box editor" id="privacy-editor">
                            <p class="text fs_16" data-aos="fade-up">
                                ここに含まれている情報は、あくまで参考を目的とする一般的なものであり、正確性については保証されていないです。また、参考内容の主な目的はトピークに関する案内だけであり、これはビジネスの戦略な基礎とみられるべきではないということを理解していただきたいです。<br/><br/>
                                一方、掲示された意見は、予告しなく変更される場合があり、或いは当社の様々な事業で述べる意見または推奨することと異なる場合があるかもしれないです。<br/><br/>
                                最後に、私たちは直ちに正確の情報を提供するために最善を尽くすものの、その正確性を保証することはできないです。また、当社はこの情報の使用による一切責任を負いかねます。<br/><br/>
                                さらに、特定の状況を徹底的に調査したうえ、専門家の適切な助言を得なければ、だれでもこのような情報に対して、行動することはできないです。お客様の必要に応じ、より多くの情報を提供できます。何卒、ご理解の程、よろしくお願いいたします。
                            </p>
                        </div>
                        <h2 class="tag darkgray fs_28 fw_bold pt-2" data-aos="fade-up">プライバシーポリシー</h2>
                        <div class="box editor" id="policy-editor">
                            <p class="text fs_16" data-aos="fade-up">
                                DAG株式会社（以下当社）は、個人情報保護に関する法令を遵守し、その取り扱い及び保護などについて、個人情報保護法に基づき、下記の通り個人情報保護方針を定めこれを実行し維持します。
                            </p>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">1.個人情報の収集・利用・提供について</h3>
                                <p class="text fs_16">当社は、個人情報を収集する場合、利用目的を的確に定め、適法かつ正当な手段によって収集します。<br/>収集した個人情報は、あらかじめ本人の同意がある場合や、法令の規定がある場合を除き、利用目的の範囲を超えた利用や第三者への提供を行いません。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">2.個人情報の安全対策</h3>
                                <p class="text fs_16">当社は、個人情報に関するリスク（個人情報への不正なアクセス、紛失、改ざん、漏えい）に対して、適切な安全管理措置をとり、個人情報の安全性・正確性を確保いたします。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">3.個人情報に関する法令・規範の遵守</h3>
                                <p class="text fs_16">当社は、個人情報に関する法令・規範を遵守し、取り扱う個人情報の保護に努めます。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">4.個人情報保護への取り組みの継続的改善について</h3>
                                <p class="text fs_16">当社は、個人情報を適切に取り扱い、確実に保護するため常にその取り組みの改善・向上に努めます。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">5.個人情報の照会、訂正、削除について</h3>
                                <p class="text fs_16">当社は、お客様ご本人の個人情報に関する照会、訂正、削除については、適切かつ迅速に対応していきます。<br/>開示などに関する手続きについては、下記お問い合わせ対応窓口までお問い合わせ下さい。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">6.個人情報の取り扱いに関するお問い合わせ</h3>
                                <p class="text fs_16">個人情報の照会、訂正、削除、苦情、その他お問い合わせについては、下記までご連絡下さい。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <h3 class="subtit fs_18 fw_bold">7.本方針の改善、変更</h3>
                                <p class="text fs_16">当社は、本方針について、継続的改善に努めます。また、法令の変更その他当社の事情により、本方針を変更することがあります。</p>
                            </div>
                            <div class="policy-item" data-aos="fade-up">
                                <div class="subtit fs_18 fw_500">DAG株式会社</div>
                            </div>

                        </div>
HTML;



        $data = [
            ['id' => $pageId1,'title' => 'プライバシーポリシー', 'details' => json_encode(
                [
                    'pic' => [['path' => '/styles/images/other/privacy-banner.jpg']],
                    'pic2' => [['path' => '/styles/images/other/privacy-banner.jpg']],
                    'topic' => '隱私政策',
                    'description' => '',
                    'link' => 'privacy',
                    'editor' => $editor1
                ]
            ),],


        ];

        $articleColumnLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_page', $articleColumnLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId1, 'object_id' => $pageId1, 'model' => 'Minmax\Article\Models\ArticlePage'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
