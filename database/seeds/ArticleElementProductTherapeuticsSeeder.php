<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementProductTherapeuticsSeeder extends Seeder
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
        $categoryId4 = DB::table('article_category')->where('uri', 'therapeutics')->value('id');


        //新增資料
        $articleElementData = [

            //医療美容 estheticmedicine
            ['id' => $articleElementId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementId1, 'details' => 'article_element.details.'.$articleElementId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementId2, 'details' => 'article_element.details.'.$articleElementId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['id' => $articleElementId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementId3, 'details' => 'article_element.details.'.$articleElementId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementId4, 'details' => 'article_element.details.'.$articleElementId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementId5, 'details' => 'article_element.details.'.$articleElementId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementId6, 'details' => 'article_element.details.'.$articleElementId6, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId7 = uuidl(), 'title' => 'article_element.title.'.$articleElementId7, 'details' => 'article_element.details.'.$articleElementId7, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

        ];
        DB::table('article_element')->insert($articleElementData);

        $editor1 = <<<HTML
        <div class="page-textbox">
                    <div class="w915 box">
                        <h2 class="tag darkgray fs_28 fw_bold">世界中の癌患者を1％削減することを約束</h2>
                        <p class="text fs_16">私たちは、革新的な医療技術により、穏やかな効果がある治療法を目指していると信じています。<br/>痛みを軽減し、早期回復をするために、私たちは物理的な方法を使用して自分の免疫力を促進し、他の治療法を加える戦略を提供することを目指しています。私たちは、これが現在、患者にとって最も有益な最良の解決策であると信じています。</p>
                    </div>
                </div>
HTML;

        $editor2 = <<<HTML
        <div class="pd-doctor">
                    <div class="zoom" style="background-image:url(styles/images/product/doctor-03_bg.jpg)">
                        <div class="inData" data-aos="fade-right">
                            <h3 class="tit fs_28 fw_bold">すべての病気は個別化されており、常に人間が設定した基準に準拠しているわけではなく、固定モデルから進化しているわけでもありません</h3>
                            <p class="text fs_16">したがって、治療過程における各疾患の対応について、柔軟性と調整性と共に重視する治療設計ということはとても大事だ。」と深く信じています。</p>
                            <div class="namebox">
                                <span class="name fs_18">Markus Bora</span>
                                <span class="pos fs_16">Doctor of Philosophy</span>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-pic jqimgFill" data-aos="fade-left" data-aos-delay="300">
                        <img src="/styles/images//product/doctor-03.jpg?0120" alt="">
                    </div>

                </div>
HTML;

        $editor3 = <<<HTML
        <div class="pd-section" id="pdsection-01">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-panelcarratelli.png" alt="PANEL CARRATELLI：FREE DUOシステム"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"></span>
                                </div>
                                <div class="pdremarks" data-aos="fade-up" data-aos-delay="50" >
                                    <div class="inData">
                                        <p class="ramarks fs_15">＊酸化ストレス（酸化ストレス、OS）とは、生物がさまざまな有害な刺激を受けたときに、体が反応性酸素フリーラジカルや反応性窒素フリーラジカルを過剰に生成し、その量が抗酸化剤の除去限界を超えて、体内の酸化反応と炎症のバランスが崩れることを指します。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500">新発売</div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">PANEL CARRATELLI：FREE DUOシステム</span>
                                    <span class="madein fs_14">イタリア生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">25年間の国際販売及び1,000篇の臨床ジャーナルでの研究発表をふまえ、酸化試験装置のトップブランド。当社の製品は、酸化ストレスの評価のために特別に設計と製造されています。医師や臨床検査科学者の最新の研究データと科学的研究からの最新治療成果を追跡することができます。<br/>当社の製品の主な特徴は、「ダブルターゲット検出」という読み取り方法です。2つの分析を同時に実行する機能を備えています。 d-ROMやBAPテストと同様に、1つのグループは酸化促進状態を評価するために使用され、もう1つのグループは酸化防止状態を評価するために使用されます。 FREE Duoは、正確、高速、簡単な診断方法を提供するだけでなく、データ管理、自動ファイリング、レポート印刷機能も備えており、人間、獣医、農業の食品分野で使用できます。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">検査できる項目：</span>血糖値、トリグリセリド、抗酸化剤、酸化促進剤、尿酸、微生物感染等 </p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">検査レポート</span>
                                        <span class="script fs_16">ダブルターゲット検出 </span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">試験試薬</span>
                                        <span class="script fs_16">13種類</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <!-- <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">ブランドサイト</a> -->

                            </div>
                        </div>
                         <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                         <div class="pd-wrapper hidden">
                            <div class="w1300 zoom">
                            </div>
                        </div>
                    </div>
HTML;

        $editor4 = <<<HTML
        <div class="pd-section" id="pdsection-02">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-sanakin.png" alt="SANAKIN®"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-14.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-13.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-15.svg" alt=""></span>
                                </div>
                                <div class="pdremarks" data-aos="fade-up" data-aos-delay="50" >
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">SANAKIN®</span>
                                    <span class="madein fs_14">ドイツ生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">これはドイツの医療免疫学技術です。これは、ヒトのサイトカイン反応のバランスをとることによって免疫系を回復させる抗炎症性血清治療です。慢性炎症は組織に損傷を与えるだけでなく、老化を加速させる可能性があるため、この反応を標的にすることは体へのダメージを減らすことができます</div>

                                <ul class="ul-style hidden">
                                    <li class="orange"></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">脱毛、皮膚疾患、関節炎、膣炎</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <!-- <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">ブランドサイト</a> -->
                            </div>
                        </div>
                         <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                         <div class="pd-wrapper hidden">
                            <div class="w1300 zoom">
                            </div>
                        </div>
                    </div>
HTML;

        $editor5 = <<<HTML
        <div class="pd-section" id="pdsection-03">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-applimed-o2.png" alt="APPLIMED-O2"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-11.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-16.svg" alt=""></span>
                                </div>
                                <div class="pdremarks" data-aos="fade-up" data-aos-offset="20">>
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">APPLIMED-O<sup>2</sup></span>
                                    <span class="madein fs_14">ドイツ生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">IOT酸素化療法は、ドイツで26年の臨床経験があり、主に血液中の酸素を増やすために使用されてきました。これにより、体の食事による炎症指数が効果的に低下し、免疫バランスが維持され、体の抗酸化作用が強化されます。また、体の免疫システムの防御機構を強化することができます。</div>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">循環器系疾患、神経系疾患、アレルギー性炎症、倦怠感、睡眠障害、肝炎、神経痛、免疫力の低下</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <!-- <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">ブランドサイト</a> -->

                            </div>
                        </div>
                         <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                         <div class="pd-wrapper hidden">
                            <div class="w1300 zoom">
                            </div>
                        </div>
                    </div>
HTML;

        $editor6 = <<<HTML
        <div class="pd-section" id="pdsection-04">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-mlds.png" alt="マルチレーザーデリバリーシステム（MLDS）"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-16.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-17.svg" alt=""></span>
                                </div>
                                <div class="pdremarks" data-aos="fade-up" data-aos-offset="20">>
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">マルチレーザーデリバリーシステム（MLDS）</span>
                                    <span class="madein fs_14">ドイツ生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">6種類のレーザー光源を備え、光力学の原理をコア治療メカニズムとして使用します。</div>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">皮膚炎、痛み、免疫力の低下、糖尿病、代謝循環の低下、脳卒中、神経損傷、長期投薬腎臓病患者。</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <!-- <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">ブランドサイト</a> -->

                            </div>
                        </div>
                         <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                         <div class="pd-wrapper">
                            <div class="w1300 zoom">
                                <div class="wpData" data-aos="fade-right">
                                    <h4 class="videotit fs_20 fw_bold">マルチレーザーデリバリーシステム（MLDS）</h4>
                                    <p class="wpscript fs_16">臨床的証拠：ミトコンドリアを効果的に活性化し、アデノシン三リン酸（ATP）を大量に合成することができ、慢性疾患の治療に大きな相乗効果をもたらします。</p>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images//product/pd-mlds-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images//common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $editor7 = <<<HTML
<div class="page-bt-linkbox">
                    <div class="bg-img jqimgFill"><img src="/styles/images/product/therapeutics-contact.jpg" alt=""></div>
                    <div class="w1100 zoom">
                        <h2 class="hidden">お問い合わせ</h2>
                        <a href="contact">
                            <span class="link-data">
                                <span class="tit fs_28 fw_500" style="color:#413D3C">お問い合わせ</span>
                                <span class="subtit fs_16" style="color:#0990D0">Contact</span>
                                <span class="text fs_16" style="color:#333333">ご不明な点がございましたら、お気軽にお問い合わせください</span>
                            </span>
                        </a>
                    </div>
                </div>
HTML;





        $data = [
            ['id' => $articleElementId1, 'title' => '世界中の癌患者を1％削減することを約束','details' => json_encode(['editor' => $editor1])],
            ['id' => $articleElementId2, 'title' => '馬庫斯·波拉（Markus Bora）','details' => json_encode(['editor' => $editor2])],
            ['id' => $articleElementId3, 'title' => 'PANEL CARRATELLI：FREE DUOシステム','details' => json_encode(['editor' => $editor3])],
            ['id' => $articleElementId4, 'title' => 'SANAKIN','details' => json_encode(['editor' => $editor4])],
            ['id' => $articleElementId5, 'title' => 'APPLIMED-O2','details' => json_encode(['editor' => $editor5])],
            ['id' => $articleElementId6, 'title' => 'マルチレーザーデリバリーシステム（MLDS）','details' => json_encode(['editor' => $editor6])],
            ['id' => $articleElementId7, 'title' => 'お問い合わせ','details' => json_encode(['editor' => $editor7])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId4, 'object_id' => $articleElementId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId5, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId6, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementId7, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
