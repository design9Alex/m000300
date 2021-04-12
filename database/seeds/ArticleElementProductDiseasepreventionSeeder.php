<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementProductDiseasepreventionSeeder extends Seeder
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
        $categoryId4 = DB::table('article_category')->where('uri', 'diseaseprevention')->value('id');


        //新增資料
        $articleElementData = [

            //医療美容 estheticmedicine
            ['id' => $articleElementId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementId1, 'details' => 'article_element.details.'.$articleElementId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementId2, 'details' => 'article_element.details.'.$articleElementId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['id' => $articleElementId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementId3, 'details' => 'article_element.details.'.$articleElementId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementId4, 'details' => 'article_element.details.'.$articleElementId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementId5, 'details' => 'article_element.details.'.$articleElementId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementId6, 'details' => 'article_element.details.'.$articleElementId6, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

        ];
        DB::table('article_element')->insert($articleElementData);

        $editor1 = <<<HTML
        <div class="page-textbox">
                            <div class="w915 box">
                                <h2 class="tag darkgray fs_28 fw_bold">予防は治療よりも優れており、<br/>大変な病気にかかる前に予防効果を達成するを図ります</h2>
                                <p class="text fs_16">当社は、日本と台湾において、数少ないキノコの薬用と健康を目的に提供する研究開発並びに製造センターの1つであり、原材料、臨床、安全性試験と生産を行っており、さまざまな特殊機能栄養素やOEMおよびODMサービスなど、高単位の抽出濃縮製品を提供することができます。</p>
                            </div>
                        </div>
HTML;

        $editor2 = <<<HTML
        <div class="pd-doctor">
                    <div class="zoom" style="background-image:url(styles/images/product/doctor-02_bg.jpg)">
                        <div class="inData" data-aos="fade-right">
                            <h3 class="tit fs_28 fw_bold">健康と幸福は贅沢ではなく、基本的な人間のニーズです</h3>
                            <p class="text fs_16">安全で副作用がないと主張する薬はますます増えていますが、人体に長期間使用すると他の続発症を引き起こす可能性があります。自分の免疫力を強化することこそ、自分の体を病気や細菌から守ることができます。</p>
                            <div class="namebox">
                                <span class="name fs_18">Min-Chung Huang</span>
                                <span class="pos fs_16">Doctor of Philosophy</span>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-pic jqimgFill" data-aos="fade-left" data-aos-delay="300">
                        <img src="/styles/images//product/doctor-02.jpg?0120" alt="">
                    </div>

                </div>
HTML;

        $editor3 = <<<HTML
        <div class="pd-section" id="pdsection-01">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-eptronid.png" alt="エプトロニド（国際版）"></div>
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-eptronid.png" alt="エプトロニド（国際版）"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-11.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500">新発売</div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">エプトロニド（国際版）</span>
                                    <span class="madein fs_14 hidden"><!-- 產地沒有標註則 madein 隱藏 --></span>
                                </h3>
                                <div class="pdtext fs_16 gray">一般にAntrodiacinnamomeaとして知られ、Polyporaceae科に属する多年生の真菌であり、台湾で最高レベルの保護を備えた樹齢100年以上のクスノキにのみ生息します。この木は、台湾に特有な場所のみ見つけられます。特に標高450〜2000メートルの山岳地帯にあります。これの健康効果はGanoderma lucidumを上回り、非常に貴重なキノコとなっているため、Ganoderma属の「王様」と呼ばれることもあります。キノコは「台湾の国宝」であるクスノキに寄生し、200種類以上のトリテルペノイド、Antrodia camphorata多糖類、スーパーオキシドジスムターゼ（SOD）、その他の有益な成分が豊富に含まれています。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>アントロステロール（300mg）、Antrodia camphorata多糖類、アデノシン </p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">肝臓の代謝不良、口の中に苦味がある、中毒、血圧の調節、代謝の促進</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">500mg×30キャップ/ボトル</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <!-- <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">ブランドサイト</a> -->
                            </div>
                        </div>
                         <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                         <div class="pd-wrapper hidden">
                            <div class="w1300 zoom">
                                <div class="wpData" data-aos="fade-right">
                                    <h4 class="videotit fs_20 fw_bold">影片標題</h4>
                                    <p class="wpscript fs_16">スイスと日本の医療用精密機器は、注射の過程で医師を支援するために使用されます。治療経験の時間効率を最大化することに伴い、患者の痛みを最小限に抑え、非外傷性の概念を実現します。</p>
                                    <!-- 有上傳dm圖片時顯示, 若上傳的是pdf則另開視窗 -->
                                    <div class="dm-btn">
                                        <!-- 上傳的dm是圖片 -->
                                        <a class="lightbtn dmclick" href="/styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="/styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images//product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images//common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
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
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-apuxan2.png" alt="APUXAN2免疫アクティブスプレー"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-12.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-13.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">APUXAN<sup>2</sup>免疫アクティブスプレー</span>
                                    <span class="madein fs_14">ドイツ生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">主な成分はブラジルのキノコと亜鉛です。また、β-1.3-1.6-グルカンを含み、免疫刺激剤として30年以上使用されています。<br/>しかし、人体は高分子量のβ-グルカンを有効に利用できないため、β-グルカン製品の粉末やカプセル状にしたとしても、直接代謝されるだけです。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>ブラジルのキノコ、アガリクス茸、亜鉛、レシチン（大豆）</p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">急性インフルエンザ感染、慢性気管支炎、花粉症とダニによるアレルギー、喘息とアレルギー</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">30ml×1本</span>
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
                                    <h4 class="videotit fs_20 fw_bold">APUXAN<sup>2</sup>免疫アクティブスプレー</h4>
                                    <p class="wpscript fs_16">私たちが代表するAPUXAN2は、特許取得済みのPuranoTec®製造技術を備えており、ブラジルのキノコ全体（重要な栄養素-β-1.3-1.6-グルカンを含む）をナノセルに変換して、有効成分を高く吸収さえれることができます。その上、免疫システvムを強化してなります。</p>
                                    <!-- 有上傳dm圖片時顯示, 若上傳的是pdf則另開視窗 -->
                                    <div class="dm-btn hidden">
                                        <!-- 上傳的dm是圖片 -->
                                        <a class="lightbtn dmclick" href="/styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="/styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images//product/pd-apuxan2-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images//common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
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
                                    <div class="pdimg jqimgFill"><img src="/styles/images//product/pd-curaxan2.png" alt="CURAXAN2クルクミンアクティブスプレー"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images//product/label-12.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images//product/label-13.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16">医薬品グレードの口腔粘膜スプレー</p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">CURAXAN<sup>2</sup>クルクミンアクティブスプレー</span>
                                    <span class="madein fs_14">ボトル生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">クルクミンは溶解度が低く、経口投与後の吸収率は2％ですが、強力な抗酸化効果があるため、広く使用されています。<br/>人体における吸収率を改善するために、ドイツの生物学チームは特許取得済みのPuranoTec®プロセスを開発しました。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>クルクミン、大豆レシチン、大豆油、中鎖トリグリセリド（MCT）油、亜鉛 <span class="ps">*  ドイツの処方薬</span></p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">腫瘤抑制、關節炎、炎症性腸病、術後炎症、潰瘍性結腸炎</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">30mL×1ボトル</span>
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
                                    <h4 class="videotit fs_20 fw_bold">CURAXAN<sup>2</sup>クルクミンアクティブスプレー</h4>
                                    <p class="wpscript fs_16">この特色はナノセルがクルクミンの担体として働き、そしてクルクミンがナノセルになると、口腔粘膜から直接血液循環に入ることができます。これにより、抗炎症物質は体に速やかに吸収されて、利用されます。</p>
                                    <!-- 有上傳dm圖片時顯示, 若上傳的是pdf則另開視窗 -->
                                    <div class="dm-btn hidden">
                                        <!-- 上傳的dm是圖片 -->
                                        <a class="lightbtn dmclick" href="/styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="/styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images//product/pd-curaxan2-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images//common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $editor6 = <<<HTML
<div class="page-bt-linkbox">
                    <div class="bg-img jqimgFill"><img src="/styles/images/product/disease-contact.jpg" alt=""></div>
                    <div class="w1100 zoom">
                        <h2 class="hidden">お問い合わせ</h2>
                        <a href="/contact">
                            <span class="link-data">
                                <span class="tit fs_28 fw_500" style="color:#ffffff">お問い合わせ</span>
                                <span class="subtit fs_16" style="color:#0990D0">Contact</span>
                                <span class="text fs_16" style="color:#ffffff">ご不明な点がございましたら、お気軽にお問い合わせください</span>
                            </span>
                        </a>
                    </div>
                </div>
HTML;





        $data = [
            ['id' => $articleElementId1, 'title' => '預防勝於治療','details' => json_encode(['editor' => $editor1])],
            ['id' => $articleElementId2, 'title' => '健康と幸福は贅沢ではなく、基本的な人間のニーズです','details' => json_encode(['editor' => $editor2])],
            ['id' => $articleElementId3, 'title' => 'エプトロニド（国際版）','details' => json_encode(['editor' => $editor3])],
            ['id' => $articleElementId4, 'title' => 'APUXAN2免疫アクティブスプレー⁺','details' => json_encode(['editor' => $editor4])],
            ['id' => $articleElementId5, 'title' => 'CURAXAN2クルクミンアクティブスプレー','details' => json_encode(['editor' => $editor5])],
            ['id' => $articleElementId6, 'title' => 'お問い合わせ','details' => json_encode(['editor' => $editor6])],
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
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
