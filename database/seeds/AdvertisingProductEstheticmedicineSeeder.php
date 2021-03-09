<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class AdvertisingProductEstheticmedicineSeeder extends Seeder
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
        $categoryId4 = DB::table('article_category')->where('uri', 'estheticmedicine')->value('id');


        //新增資料
        $articleElementData = [

            //医療美容 estheticmedicine
            ['id' => $articleElementEstheticmedicineId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId1, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementEstheticmedicineId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId2, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['id' => $articleElementEstheticmedicineId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId3, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementEstheticmedicineId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId4, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementEstheticmedicineId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId5, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementEstheticmedicineId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId6, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId6, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementEstheticmedicineId7 = uuidl(), 'title' => 'article_element.title.'.$articleElementEstheticmedicineId7, 'details' => 'article_element.details.'.$articleElementEstheticmedicineId7, 'sort' => 7, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
        ];
        DB::table('article_element')->insert($articleElementData);

        $estheticmedicineEeditor1 = <<<HTML
        <div class="page-textbox">
                            <div class="w915 box">
                                <h2 class="tag darkgray fs_28 fw_bold">医療機器、材料、皮膚修復製品</h2>
                                <p class="text fs_16">製薬の経験を以って、医療機器、材料、術後医療製品の開発まで拡大し、皮膚科医や整形外科医の美容医療の要件を満たします。</p>
                            </div>
                        </div>
HTML;

        $estheticmedicineEeditor2 = <<<HTML
        <div class="pd-doctor">
                            <div class="zoom" style="background-image:url('/styles/images/product/doctor-01_bg.jpg')">
                                <div class="inData" data-aos="fade-right">
                                    <h3 class="tit fs_28 fw_bold">ミケランジェロがダビデ像を作成していたとき、彼は巨大な白い大理石に直面し、「ダビデ像はすでに大理石の中にあります。余分なものを削り取りたいだけです」と言いました。</h3>
                                    <p class="text fs_16">外科医の責任は、患者さんの美しさを人生で真に表現できるように、患者さんに最適な製品を選択することです。</p>
                                    <div class="namebox">
                                        <span class="name fs_18">久保田 全</span>
                                        <span class="pos fs_16">DOCTORS</span>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-pic jqimgFill" data-aos="fade-left" data-aos-delay="300">
                                <img src="/styles/images/product/doctor-01.jpg?0120" alt="">
                            </div>

                        </div>
HTML;

        $estheticmedicineEeditor3 = <<<HTML
        <div class="pd-section" id="pdsection-01">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images/product/pd-pnxr.png" alt="PNXR-相同アミノ酸で構成される活性分子ペプチド"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案-->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images/product/label-01.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-02.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500">新発売</div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">PNXR-相同アミノ酸で構成される活性分子ペプチド</span>
                                    <span class="madein fs_14">韓国生産</span>
                                    <!-- 產地沒有標註則 madein 隱藏 -->
                                </h3>
                                <div class="pdtext fs_16 gray">「PNXRの主成分は、サケのDNAから抽出されたポリデオキシリボヌクレオチド（PDRN）です。ヒトのDNA配列との類似性は98％にも上ります。PDRNは皮膚細胞の分裂を促進し、老化した線維芽細胞を置換してコラーゲンとヒアルロン酸の分泌を刺激し、皮膚組織の弾力性と水分貯蔵機能を高めて皮膚の健康と若返りを維持することで作用します。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>ポリデオキシリボヌクレオチド（PDRN）、グルタチオン、PDRN投与量：2％</p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">くすみ、大きな毛穴、ニキビ跡</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">3mL x5バイアル/ボックス</span>
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
                                        <a class="lightbtn dmclick" href="styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images/product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images/common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $estheticmedicineEeditor4 = <<<HTML
        <div class="pd-section" id="pdsection-02">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images/product/pd-scdm1.png" alt="S-CDM1⁺"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images/product/label-03.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-04.svg" alt=""></span>
                                </div>
                                <!-- pdremarks沒有資料就hidden -->
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">S-CDM1⁺</span>
                                    <span class="madein fs_14">台湾生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">傷を修復する際に、コラーゲンが増殖しすぎる影響によって、真皮に組織の障害や不規則性が発生する可能性があります。この問題をうまく改善するために、 S-CDM1 +は、特許取得済みのβ-1,3-グルカンナノテクノロジーをいかして、傷ついた組織による諸問題を防ぎながら、血管収縮を促進し、傷の増殖を抑え、瘢痕という状態を改善し、速やかに創傷治療及びにツルツルな皮膚状態を回復することができます。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>β-1,3-グルカン、N-アセチルグルコサミン</p></li>
                                </ul>

                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">創傷治癒、美容レーザー、MTSによる微小外傷口、皮膚の炎症</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">12.5mL x1バイアル/ボックス</span>
                                    </div>
                                </div>

                                <!-- 外連到產品介紹頁面，客戶自訂連結 -->
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
                                        <a class="lightbtn dmclick" href="styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="styles/images/product/180727_ADH_catalog_B01_ol.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images/product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images/common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $estheticmedicineEeditor5 = <<<HTML
        <div class="pd-section" id="pdsection-03">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images/product/pd-lactolabpro.png" alt="LACTOLAB PRO"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images/product/label-05.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-01.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">LACTOLAB PRO</span>
                                    <span class="madein fs_14">台湾生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">コア成分であるコロストラムペプチドコンプレックスプラス（CP）2+は、皮膚の修復能力を強化し、再成長を促進する高度な複合ペプチドです。その非医薬品製剤は、さまざまなタイプの皮膚のさまざまな要件を満たし、また傷に抗炎症効果を提供します。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>免疫グロブリン、抗生物質、ペプチド、成長因子（EGF、TGF-α、TGF-β、IGF-I、IGF-II、PDGF、VEGF）</p></li>
                                </ul>
                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">II型糖尿病の傷、アレルギー、おむつ発疹、にきび、傷の炎症</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">12.5mL x1バイアル/ボックス</span>
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
                                        <a class="lightbtn dmclick" href="styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images/product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images/common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $estheticmedicineEeditor6 = <<<HTML
        <div class="pd-section" id="pdsection-04">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images/product/pd-laracine.png" alt="La Racine - Automated Dermal Hydrator 医療美容機器は"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images/product/label-06.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-07.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-08.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">La Racine - Automated Dermal Hydrator 医療美容機器は</span>
                                    <span class="madein fs_14">台湾生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">日本の東芝パネルとスイスの航空宇宙エンジンマクソンによって製造されたメソセラピー医療美容機器は、さまざまな皮膚層に製品を正確に注入することができます。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">機器の特徴：</span>正確な制御、簡単な操作、および液漏れのない精密メソセラピー装置により、医師は10分以内に2c.cの「薬剤節約モード」の全面注射治療で迅速かつ効率的に完了することができます。</p></li>
                                </ul>
                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">応用</span>
                                        <span class="script fs_16">さまざまな薬物運送補助剤</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">技術</span>
                                        <span class="script fs_16">安定した注入供給システム、特許取得済みのフィルターシステム</span>
                                    </div>
                                </div>

                                <!-- 客戶自訂連結到產品介紹頁面 -->
                                <a class="pd-detaillink fs_16" href="https://www.bire.jp/" target="_blank">
                                    <span class="url">https://www.bire.jp/</span>
                                    <span class="icon"><img class="svg" src="/styles/images/common/icon-url.svg" alt=""></span>
                                </a>

                            </div>

                        </div>
                        <!-- 沒有影片連結、縮圖、dm時，整區 pd-wrapper隱藏-->
                        <div class="pd-wrapper">
                            <div class="w1300 zoom">
                                <div class="wpData" data-aos="fade-right">
                                    <h4 class="videotit fs_20 fw_bold">La Racine - Automated Dermal Hydrator 医療美容機器は</h4>
                                    <p class="wpscript fs_16">スイスと日本の医療用精密機器は、注射の過程で医師を支援するために使用されます。治療経験の時間効率を最大化することに伴い、患者の痛みを最小限に抑え、非外傷性の概念を実現します。</p>
                                    <!-- 有上傳dm圖片時顯示, 若上傳的是pdf則另開視窗 -->
                                    <div class="dm-btn">
                                        <!-- 上傳的dm是圖片 -->
                                        <a class="lightbtn dmclick" href="styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <a class="lightbtn" href="styles/images/product/180727_ADH_catalog_B01_ol.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH(PDF) </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images/product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images/common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;

        $estheticmedicineEeditor7 = <<<HTML
        <div class="pd-section" id="pdsection-05">
                        <div class="w1300 content">
                            <div class="imgbox">
                                <!-- 圖片尺寸 w600 * h460 建議為png透明背景-->
                                <div class="pd-slider" data-aos="fade-up" data-aos-delay="50" data-aos-offset="20">
                                    <div class="pdimg jqimgFill"><img src="/styles/images/product/pd-laracinemask.png" alt="LA RACINE MASK"></div>
                                </div>
                                <!-- 產品圖標籤，客戶可以自己增加樣式 w70 * h70，格式為svg檔案 -->
                                <div class="pdlabel" data-aos="fade">
                                    <span class="label"><img src="/styles/images/product/label-09.svg" alt=""></span>
                                    <span class="label"><img src="/styles/images/product/label-10.svg" alt=""></span>
                                </div>
                                <div class="pdremarks">
                                    <div class="inData"></div>
                                </div>
                            </div>
                            <div class="pdData" data-aos="fade-up" data-aos-offset="20">
                                <div class="sublabel fs_14 fw_500 hidden"><!-- 沒有資料就hidden --></div>
                                <p class="subtitle fs_16 hidden"><!-- 沒有資料就hidden --></p>
                                <h3 class="pdname dash">
                                    <span class="name fs_28 fw_bold">LA RACINE MASK</span>
                                    <span class="madein fs_14">台湾生産</span>
                                </h3>
                                <div class="pdtext fs_16 gray">すぐに持続する保湿効果があり、高効率の保湿活性成分であるセラミドにより、乾燥肌の活力を取り戻し、保湿機能を強化します。特に、皮膚の脱水状態を改善することができ、皮膚を傷つきやすい医療美容後の治療にもお勧めします。肌は光沢があり弾力性があります。</div>

                                <ul class="ul-style">
                                    <li class="orange"><p class="fs_16 gray"><span class="fw_bold">主な成分：</span>SKフラックスV、スクアラン、セラミド複合体、有機フライシ    ャーヤナギ葉抽出物、ヒアルロン酸、ヒアルロン酸</p></li>
                                </ul>
                                <div class="detail">
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">適応症</span>
                                        <span class="script fs_16">くすみ、肌の色むら、乾燥、もろさ、過敏症</span>
                                    </div>
                                    <div class="item">
                                        <span class="taglabel fs_14 fw_bold">容量</span>
                                        <span class="script fs_16">25mL×3個</span>
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

                                    <p class="wpscript fs_16">スイスと日本の医療用精密機器は、注射の過程で医師を支援するために使用されます。治療経験の時間効率を最大化することに伴い、患者の痛みを最小限に抑え、非外傷性の概念を実現します。</p>
                                    <!-- 有上傳dm圖片時顯示, 若上傳的是pdf則另開視窗 -->
                                    <div class="dm-btn">
                                        <!-- 上傳的dm是圖片 -->
                                        <a class="lightbtn dmclick" href="styles/images/product/pd-laracine-dm.jpg" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a>
                                        <!-- 上傳的dm是pdf檔案 dmclick拿掉 -->
                                        <!-- <a class="lightbtn" href="styles/images/product/demo-dm.pdf" target="_blank" title="ララシーン-ADH">
                                            <span class="fs_16">ララシーン-ADH </span>
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-white.svg" alt="arrow"></span>
                                        </a> -->
                                    </div>
                                </div>
                                 <!-- 如果沒有上傳縮圖+影片id，video-pic 整區隱藏 加上hidden class-->
                                 <!-- 沒有影片連結有上傳影片圖片，隱藏playicon -->
                                 <div class="video-pic" data-aos="fade">
                                    <a data-rel="lightcase" href="https://www.youtube.com/embed/gG7uCskUOrA">
                                        <span class="img jqimgFill">
                                            <img src="/styles/images/product/pd-laracine-video.jpg" alt="">
                                            <span class="playicon"><img class="svg" src="/styles/images/common/icon-video-triangle.svg" alt=""></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
HTML;



        $data = [
            ['id' => $articleElementEstheticmedicineId1, 'title' => '医療機器、材料、皮膚修復製品','details' => json_encode(['editor' => $estheticmedicineEeditor1])],
            ['id' => $articleElementEstheticmedicineId2, 'title' => '久保田 全','details' => json_encode(['editor' => $estheticmedicineEeditor2])],
            ['id' => $articleElementEstheticmedicineId3, 'title' => 'PNXR-相同アミノ酸で構成される活性分子ペ','details' => json_encode(['editor' => $estheticmedicineEeditor3])],
            ['id' => $articleElementEstheticmedicineId4, 'title' => 'S-CDM1⁺','details' => json_encode(['editor' => $estheticmedicineEeditor4])],
            ['id' => $articleElementEstheticmedicineId5, 'title' => 'LACTOLAB PRO','details' => json_encode(['editor' => $estheticmedicineEeditor5])],
            ['id' => $articleElementEstheticmedicineId6, 'title' => 'La Racine - Automated Dermal Hydrator 医療美容機器は','details' => json_encode(['editor' => $estheticmedicineEeditor6])],
            ['id' => $articleElementEstheticmedicineId7, 'title' => 'La Racine - Automated Dermal Hydrator 医療美容機器は','details' => json_encode(['editor' => $estheticmedicineEeditor7])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId5, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId6, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementEstheticmedicineId7, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}

