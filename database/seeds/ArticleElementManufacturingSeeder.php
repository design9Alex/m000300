<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementManufacturingSeeder extends Seeder
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
        $categoryId3 = DB::table('article_category')->where('uri', 'manufacturing_and_research')->value('id');
        $categoryId3_1 = DB::table('article_category')->where('uri', 'manufacturing')->value('id');
        $categoryId3_2 = DB::table('article_category')->where('uri', 'research')->value('id');


        //新增資料
        $articleElementData = [

            //製造與開發
            ['id' => $articleElementManufacturingId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId1, 'details' => 'article_element.details.'.$articleElementManufacturingId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId2, 'details' => 'article_element.details.'.$articleElementManufacturingId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId3, 'details' => 'article_element.details.'.$articleElementManufacturingId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId4, 'details' => 'article_element.details.'.$articleElementManufacturingId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId5, 'details' => 'article_element.details.'.$articleElementManufacturingId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId6, 'details' => 'article_element.details.'.$articleElementManufacturingId6, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId7 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId7, 'details' => 'article_element.details.'.$articleElementManufacturingId7, 'sort' => 7, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId8 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId8, 'details' => 'article_element.details.'.$articleElementManufacturingId8, 'sort' => 8, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId9 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId9, 'details' => 'article_element.details.'.$articleElementManufacturingId9, 'sort' => 9, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId10 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId10, 'details' => 'article_element.details.'.$articleElementManufacturingId10, 'sort' => 10, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId11 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId11, 'details' => 'article_element.details.'.$articleElementManufacturingId11, 'sort' => 11, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId19 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId19, 'details' => 'article_element.details.'.$articleElementManufacturingId19, 'sort' => 12, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],



            //醫學研究

            ['id' => $articleElementManufacturingId12 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId12, 'details' => 'article_element.details.'.$articleElementManufacturingId12, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId13 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId13, 'details' => 'article_element.details.'.$articleElementManufacturingId13, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId14 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId14, 'details' => 'article_element.details.'.$articleElementManufacturingId14, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId15 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId15, 'details' => 'article_element.details.'.$articleElementManufacturingId15, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId16 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId16, 'details' => 'article_element.details.'.$articleElementManufacturingId16, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId17 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId17, 'details' => 'article_element.details.'.$articleElementManufacturingId17, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId18 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId18, 'details' => 'article_element.details.'.$articleElementManufacturingId18, 'sort' => 7, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementManufacturingId20 = uuidl(), 'title' => 'article_element.title.'.$articleElementManufacturingId20, 'details' => 'article_element.details.'.$articleElementManufacturingId20, 'sort' => 8, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],


        ];
        DB::table('article_element')->insert($articleElementData);

        $facturingIdEditor1 = <<<HTML
        <div class="page-textbox">
                    <div class="w915 box">
                        <h2 class="tag darkgray fs_28 fw_bold">高品質の機能製品を生産できる生物医学技術</h2>
                        <p class="text fs_16">現代の人々が、製品の原料に対し、より自然で、非化学的、副作用ない医薬品を追求することを満足するため、当社は、「老化の遅延」、「疾患抑制」、「予防ヘルスケア」を目的としたシリーズの機能健康製品を開発することをめぐり、最先端な医薬技術を導入しました。</p>
                    </div>
                </div>
HTML;

        $facturingIdEditor2 = <<<HTML
        <div class="manufact-produce">
                    <div class="zoom">
                        <div class="scriptbox">
                            <h2 class="tit dash fw_bold fs_28">医薬品レベルの生産</h2>
                            <div class="text fs_16">25年間5,600種類のキノコの研究に注力してきた菌株センター（台湾No.1の菌株センター）の原材料を使用します。更に、原材料の有効性を評価するために、さらに薬学博士を派遣し、有効性（薬理活性）、差異（追加有効性）、 人体に対する安全性という三つの要件を中心に、DAG会社に属する慢性疾患を予防する専用の原材料開発システムを確立してきました。その過程で、細胞と動物の実験は画像分析システムを介して分析され、使用される原材料の安全性を確保するために、生体内と生体の同時研究が行われます</div>
                        </div>
                    </div>
                    <div class="bg-img jqimgFill"><img src="/styles/images/manufacturing/manufacturing-01.jpg" alt=""></div>
                </div>
HTML;

        $facturingIdEditor3 = <<<HTML
        <div class="manufact-oem">
                    <div class="w1300 zoom">
                        <h2 class="tag darkgray fs_24 fw_bold text-center">OEM/ODM機能保健商品の生産プロセス</h2>
                        <div class="chartbox lightblue-bg">
                            <div class="chart-list">
                                <div class="item" style="color:#00327B">
                                    <span class="fs_16">カスタマイズされた開発</span>
                                </div>
                                <div class="arrow">
                                    <span><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span>
                                </div>
                                <div class="item" style="color:#008DDA">
                                    <span class="fs_16 max175">パフォーマンスおよび安全性テストレポート</span>
                                </div>
                                <div class="arrow">
                                    <span><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span>
                                </div>
                                <div class="item" style="color:#78C7F0">
                                    <span class="fs_16">プロセス生産</span>
                                </div>
                            </div>
                            <div class="chart-end">
                                <span class="fs_16">最高品質を達成するために、食品および健康製品のGMP基準を満たすだけではなく、医薬品グレードのPIC / S GMPを工場の加工から製造生産まで導入して、業界の最高標準を達成しました。</span>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor4 = <<<HTML
        <div class="manufact-process lightinggray-bg upstraight">
                    <div class="line">|</div>
                    <div class="w1300 zoom">
                        <h2 class="tag darkgray fs_24 fw_bold text-center" data-aos="fade-up">栽培原料・栽培加工環境</h2>
                        <div class="pic-group">
                            <div class="item" data-aos="fade-up" data-aos-delay="200">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-02.jpg" alt="菌糸の消毒と植え付け"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">菌糸の消毒と植え付け</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="400">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-03.jpg" alt="菌糸栽培環境"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">菌糸栽培環境</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="600">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-04.jpg" alt="知能管理環境"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">知能管理環境</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor5 = <<<HTML
        <div class="manufact-textbox">
                    <div class="w1300">
                        <h2 class="tag darkgray fs_24 fw_bold text-center">在来種の完全な保存、さまざまな株の分離と育種、最適化された栽培技術</h2>
                    </div>
                </div>
HTML;

        $facturingIdEditor6 = <<<HTML
        <div class="manufact-section">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="/styles/images/manufacturing/manufacturing-05.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="inTextbox" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">業界最高の特許取得済み生産技術</h2>
                            <div class="text fs_16 fw_500">開発、研究、管理テスト</div>
                        </div>
                        <div class="content">
                            <p class="fs_16" data-aos="fade-up">成分活性分析および高活性増強研究、成分分離および分析（薄スライスクロマトグラフィー（TLC）、核磁気共鳴（NMR）、高性能液体クロマトグラフィー（HPLC）、紫外線分光計（UV）と直列の液体クロマトグラフィー） ）、ダイオードアレイ（DAD）、さらには質量分析（LC-ESI（+）-MS / MS）、極性の違いを使用して、純粋な化合物が得られるまでターゲットを抽出、分離、精製し、分子構造分析などをデータに実行してなった。そして、データ管理を実現できるデータベースが確立されました。</p>
                            <p class="fs_16 lightgray" data-aos="fade-up">*医薬品グレードのキノコについては、果実体や活性化合物の薬理学的メカニズム、毒物学、動物モデル検証を分析し、前臨床研究を行っています。</p>
                            <div class="flow-chart">
                                <div class="item" data-aos="zoom-in">
                                    <div class="ciclebox" style="color:#0B62AF">
                                        <span class="fs_18">抽出</span>
                                    </div>
                                    <div class="arrow"></div>
                                </div>
                                <div class="item" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="ciclebox" style="color:#1590CC">
                                        <span class="fs_18">分離</span>
                                    </div>
                                    <div class="arrow"></div>
                                </div>
                                <div class="item item-row" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="ciclebox" style="color:#7AC8EF">
                                        <span class="fs_18">精製</span>
                                    </div>
                                    <div class="arrow"></div>
                                </div>
                                <div class="item item-branch" data-aos="fade" data-aos-delay="400">
                                    <div class="data-box">
                                        <span class="fs_16">分子構造分析</span>
                                    </div>
                                    <div class="data-box">
                                        <span class="fs_16">データベースの確立</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor7 = <<<HTML
        <div class="manufact-process lightinggray-bg upstraight">
                    <div class="line">|</div>
                    <div class="w1300 zoom">
                        <h2 class="tag darkgray fs_24 fw_bold text-center" data-aos="fade-up">研究センター-277種のキノコ</h2>
                        <div class="pic-group">
                            <div class="item" data-aos="fade-up" data-aos-delay="200">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-06.jpg" alt="母株"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">母株</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="400">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-07.jpg" alt="回転式濃縮機"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">回転式濃縮機</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="600">
                                <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-08.jpg" alt="菌糸測定"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">菌糸測定</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
HTML;

        $facturingIdEditor8 = <<<HTML
        <div class="manufact-textbox">
                    <div class="w1300">
                        <h2 class="tag darkgray fs_24 fw_bold text-center">健康に有益な成分に関する研究(ACH (Actives of health))</h2>
                        <p class="text fs_16 darkgray">薬理学に基づいて、相乗作用と相加効果を運用と開発することができます。<br/>さらに、科学的実験、有効性、数値的パフォーマンスを通じて、慢性疾患予防研究システムを確立するための追跡および評価計画が確立されました。</p>
                    </div>
                </div>
HTML;

        $facturingIdEditor9 = <<<HTML
        <div class="manufact-section">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="/styles/images/manufacturing/manufacturing-09.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="inTextbox" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">安全で信頼性の高い製品を作る</h2>
                            <div class="text fs_16 fw_500">医療レベルに達る高性能健康食品</div>
                        </div>
                        <div class="content">
                            <div class="row safepd-data">
                                <div class="col">
                                    <p class="fs_16 darkgray">キノコの発生源の特定、成分分離および薬理活性の分析により、経済的価値の高い薬用キノコの元の種が開発され、保存されました。<br/>さらに、最高の活性医薬品グレードをスクリーニングするために、DNA分子鑑定とコアマーカーを通じて、数万のDNAデータベースを活かします。最後に、製品の安全性と有効性を確保するため、入念に在来種または希少種の鑑定を進めています。</p>
                                    <ul class="pt-sm-4 pt-2">
                                        <li><p class="fs_16 darkgray">A.菌糸の顯微型態</p></li>
                                        <li><p class="fs_16 darkgray">B.ターゲットシーケンス分析</p></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <div class="safepd-pic"><img src="/styles/images/manufacturing/manufacturing-10.jpg" alt=""></div>
                                    <div class="safepd-pic"><img src="/styles/images/manufacturing/manufacturing-11.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor10 = <<<HTML
        <div class="manufact-process lightingblue-bg upstraight">
                    <div class="line">|</div>
                    <div class="w1300 zoom">
                        <h2 class="tag darkgray fs_24 fw_bold text-center">きのこ菌糸栽培プロセス</h2>
                        <div class="pic-set">
                            <div class="group">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-12.jpg" alt=""></div>
                                </div>
                                <p class="text fs_15">野生の牛樟芝</p>
                            </div>
                            <div class="group twice">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-13.jpg" alt=""></div>
                                    <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-14.jpg" alt=""></div>
                                </div>
                                <p class="text fs_15">培養された菌糸を観察する（表と裏）</p>
                            </div>
                            <div class="group">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-15.jpg" alt=""></div>
                                </div>
                                <p class="text fs_15">野生の牛樟芝</p>
                            </div>
                            <div class="group">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/manufacturing/manufacturing-16.jpg" alt=""></div>
                                </div>
                                <p class="text fs_15">野生の牛樟芝</p>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor11 = <<<HTML
        <div class="manufact-chart">
                    <div class="w1300">
                        <div class="chart-box">
                            <div class="item">
                                <span class="pic"><img src="/styles/images/manufacturing/manufacturing-17.jpg" alt=""></span>
                                <p class="text fs_15">EACはマウスモデルの腫瘍増殖を抑えた</p>
                            </div>
                            <div class="item">
                                <span class="pic"><img src="/styles/images/manufacturing/manufacturing-18.jpg" alt=""></span>
                                <p class="text fs_15">コレステロール / トリグリセリド、全体の値が減少しました</p>
                            </div>
                        </div>
                    </div>
                </div>
HTML;





        $facturingIdEditor12 = <<<HTML
        <div class="page-textbox">
                    <div class="w915 box">
                        <h2 class="tag darkgray fs_28 fw_bold">幹細胞、免疫療法、炎症免疫療法</h2>
                        <p class="text fs_16">臨床研究の基本概念：日本、台湾、ドイツの医療チームは、特許を取得した細胞技術を開発し、主要な医療機関と臨床研究および抗炎症製品の開発を行っています。</p>
                    </div>
                </div>
HTML;

        $facturingIdEditor13 = <<<HTML
        <div class="research-section">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="/styles/images/research/research-01.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="inTextbox" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">研究プロセス</h2>
                            <div class="text fs_16 fw_500">病院や診療所と協力するうえ、臨床事例の研究を実施します</div>
                        </div>
                        <div class="content">
                            <p class="fs_16" data-aos="fade-up">（セルプロセッシングセンター）製造ライセンスに準拠します。 医療に使用される細胞として、細胞の安全性、生存率、分化制御の安定性を確保するために、操作手順に従い、原材料、培養、さまざまなテスト、および凍結保存などを厳密に行います。</p>
                        </div>
                    </div>
                    <div class="process-box">
                        <div class="w1100 step-list">
                            <div class="step" data-aos="fade-up" data-aos-delay="200">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/research/research-02.jpg" alt=""></div>
                                </div>
                                <span class="label fs_15">STEP 01</span>
                                <p class="text fs_15">検体の組織を確認すること</p>
                            </div>
                            <div class="step" data-aos="fade-up" data-aos-delay="400">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/research/research-03.jpg" alt=""></div>
                                </div>
                                <span class="label fs_15">STEP 02</span>
                                <p class="text fs_15">栽培と厳選すること</p>
                            </div>
                            <div class="step" data-aos="fade-up" data-aos-delay="600">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/research/research-04.jpg" alt=""></div>
                                </div>
                                <span class="label fs_15">STEP 03</span>
                                <p class="text fs_15">栽培テストをすること</p>
                            </div>
                            <div class="step" data-aos="fade-up" data-aos-delay="800">
                                <div class="picbox">
                                    <div class="pic jqimgFill"><img src="/styles/images/research/research-05.jpg" alt=""></div>
                                </div>
                                <span class="label fs_15">STEP 04</span>
                                <p class="text fs_15">保存と管理すること</p>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor14 = <<<HTML
        <div class="research-section">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="/styles/images/research/research-06.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="inTextbox med-center" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">再生医療センター</h2>
                            <div class="text fs_16 fw_500">細胞医学研究部-細胞機能研究室</div>
                        </div>
                        <div class="content">
                            <p class="fs_16" data-aos="fade-up">細胞培養クリーンルームのオペレーターは、日本の医療およびバイオテクノロジーの専門学位を持ち、細胞培養の知識と5年以上の臨床診療の経験を持っている必要があります。 一方、管理面では、GMPとQMSの試験基準を同時に実施し、そして再生医療製品を生産するためには、安全管理、製造環境、人事管理などの最高品質の管理項目が求められています。</p>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor15 = <<<HTML
        <div class="manufact-process lightinggray-bg">
                    <div class="w1300 zoom">
                        <h2 class="tag darkgray fs_24 fw_bold text-center" data-aos="fade-up">分析のための主な機器-品質と安全性の検査</h2>
                        <div class="pic-group">
                            <div class="item" data-aos="fade-up" data-aos-delay="200">
                                <div class="pic jqimgFill"><img src="/styles/images/research/research-07.jpg" alt="細胞の培養状態"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">細胞の培養状態</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="400">
                                <div class="pic jqimgFill"><img src="/styles/images/research/research-08.jpg" alt="細胞の生存率記録"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">細胞の生存率記録</span>
                                </div>
                            </div>
                            <div class="item" data-aos="fade-up" data-aos-delay="600">
                                <div class="pic jqimgFill"><img src="/styles/images/research/research-09.jpg" alt="細胞の安全性試験"></div>
                                <div class="innerText">
                                    <!-- <span class="arrow"><img src="/styles/images/common/icon-arrow-right-orange.svg" alt="arrow"></span> -->
                                    <span class="text fs_16">細胞の安全性試験</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor16 = <<<HTML
        <div class="research-safety upstraight">
                    <div class="line">|</div>
                    <div class="w1300 zoom">
                        <div class="safetybox lightblue-bg">
                            <ul class="noneStyle safetylist">
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-01.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">ドナースクリーニング</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-02.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">検体テスト項目</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-03.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">安全性と毒性の検査及びテスト</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-04.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">製造工学管理</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-05.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">栽培と及び設備管理</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-06.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">パフォーマンスチェック</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="box">
                                        <div class="icon"><img src="/styles/images/research/safety-icon-07.svg" alt=""></div>
                                        <div class="text fs_16 fw_500">保存管理システム</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor17 = <<<HTML
        <div class="research-section">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="/styles/images/research/research-10.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="inTextbox QC" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">品質管理と品質認証</h2>
                            <div class="text fs_16 fw_500">細胞プロセッシングセンター（CPC施設）</div>
                        </div>
                        <div class="content">
                            <p class="fs_20 darkgray fw_bold">当社は、GMP（厚生労働省規則、グッドマニュファクチャリングプラクティスによって規定された品質基準）の基準に従い、ソフトおよびハード基準を満たすすべての施設を採用し、法規制を守りながら、細胞製造研究を運営および管理しています。</p>
                            <div class="QC-data">
                                <ul class="QC-UL">
                                    <li><p class="fs_16 darkgray">空調・電気機械管理室</p></li>
                                    <li><p class="fs_16 darkgray">製品プロセス監視室</p></li>
                                    <li><p class="fs_16 darkgray">中央監視室</p></li>
                                    <li><p class="fs_16 darkgray">研究室</p></li>
                                    <li><p class="fs_16 darkgray">製品完成試験室</p></li>
                                    <li><p class="fs_16 darkgray">更衣室</p></li>
                                    <li><p class="fs_16 darkgray">オートクレーブルーム</p></li>
                                    <li><p class="fs_16 darkgray">資材保管室</p></li>
                                    <li><p class="fs_16 darkgray">製品保管室</p></li>
                                    <li><p class="fs_16 darkgray">細胞培養室</p></li>
                                    <li><p class="fs_16 darkgray">オペレーター専用の出入り部屋</p></li>
                                    <li><p class="fs_16 darkgray">原材料（検体）試験室</p></li>
                                </ul>
                                <div class="QC-table">
                                    <table class="fs_16">
                                        <tr>
                                            <th>名稱</th>
                                            <th>細胞の数</th>
                                            <th>増殖細胞の数</th>
                                            <th>栽培の面積</th>
                                            <th>初代培養の細胞数</th>
                                        </tr>
                                        <tr>
                                            <td data-th="名稱">
                                                <span class="td-in">BIRE-AD</span>
                                            </td>
                                            <td data-th="細胞の数">
                                                <span class="td-in">1X10<sup>5</sup>(100万)</span>
                                            </td>
                                            <td data-th="増殖細胞の数">
                                                <span class="td-in">4X10<sup>6</sup>(400万)</span>
                                            </td>
                                            <td data-th="栽培の面積">
                                                <span class="td-in">4X10<sup>6</sup>(400万)</span>
                                            </td>
                                            <td data-th="初代培養の細胞数">
                                                <span class="td-in">5.6X10<sup>8</sup>(5.6億)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-th="名稱">
                                                <span class="td-in">BIRE-UC</span>
                                            </td>
                                            <td data-th="細胞の数">
                                                <span class="td-in">2X10<sup>5</sup>(200万)</span>
                                            </td>
                                            <td data-th="増殖細胞の数">
                                                <span class="td-in">8X10<sup>6</sup>(800万)</span>
                                            </td>
                                            <td data-th="栽培の面積">
                                                <span class="td-in">4X10<sup>6</sup>(400万)</span>
                                            </td>
                                            <td data-th="初代培養の細胞数">
                                                <span class="td-in">2X10<sup>9</sup>(20億)</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor18 = <<<HTML
        <div class="research-trainingroom">
                    <div class="training-textbox">
                        <div class="w1100">
                            <h2 class="tit fs_28">CPCトレーニングルーム</h2>
                            <p class="text fs_16">これは、米国連邦標準Fed.Std.209D（目標粒子サイズ0.5μm）を採用したハイレベルの細胞培養センターであり、処理並びに培養プロセスが医薬品グレードの製造と同等であることを保証します。</p>
                        </div>
                    </div>
                    <div class="training-list">
                        <div class="w1100 data-list">
                            <div class="item">
                                <div class="tag manrope"><span class="fs_24 fw_bold">10,000 </span><span class="fs_20 fw_500">です</span></div>
                                <div class="circlebox">
                                    <div class="circle">
                                        <p class="text fs_18 fw_500">無菌室の環境はクラス10,000です</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag manrope"><span class="fs_24 fw_bold">1,000 </span><span class="fs_20 fw_500">です</span></div>
                                <div class="circlebox">
                                    <div class="circle">
                                        <p class="text fs_18 fw_500">細胞処理室の環境はクラス1,000です</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag manrope"><span class="fs_24 fw_bold">100 </span><span class="fs_20 fw_500">です</span></div>
                                <div class="circlebox">
                                    <div class="circle">
                                        <p class="text fs_18 fw_500">生物学的安全キャビネットはクラス100です</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-img jqimgFill">
                        <img src="/styles/images/research/research-11.jpg" alt="">
                        <p class="text fs_16">*米国連邦標準Fed.Std.209D（ターゲット粒子サイズ0.5μm）</p>
                    </div>
                    <div class="training-script">
                        <div class="w1100">
                            <p class="text fs_16">私たちの目標は、病院や医療研究機構向けの細胞療法の研究および製造サービスを提供することです。必要な迅速な臨床検査サービスに対して、柔軟かつフレンドリーで対応することができます。</p>
                        </div>
                    </div>
                </div>
HTML;

        $facturingIdEditor19 = <<<HTML

                <div class="manufact-adbox">
                    <div class="item">
                        <h2 class="hidden">革新的な医療食品</h2>
                        <a href="diseaseprevention#pdsection-02">
                            <span class="bg-img jqimgFill"><img src="/styles/images/manufacturing/pd-ad-01.png" alt=""></span>
                            <span class="pd-data" data-aos="fade">
                                <span class="tit fs_24 fw_bold">革新的な医療食品</span>
                                <span class="subtit fw_bold">
                                    <span class="fs_20">スプレー方法</span>
                                    <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-lightblue.svg" alt="arrow"></span>
                                </span>
                                <span class="text fs_16">粘膜はすぐに吸収される   *医療機関限定</span>
                            </span>
                        </a>
                    </div>
                    <div class="item">
                        <h2 class="hidden">革新的な医療食品</h2>
                        <a href="estheticmedicine#pdsection-05">
                            <span class="bg-img jqimgFill"><img src="/styles/images/manufacturing/pd-ad-02.png" alt=""></span>
                            <span class="pd-data" data-aos="fade">
                                <span class="tit fs_24 fw_bold">革新的な医療食品</span>
                                <span class="subtit fw_bold">
                                    <span class="fs_20">健康補助カプセル</span>
                                    <span class="icon"><img class="svg" src="/styles/images/common/icon-arrow-right-lightblue.svg" alt="arrow"></span>
                                </span>
                                <span class="text fs_16">医療機関で使用するために特別に開発されました</span>
                            </span>

                        </a>
                    </div>
                </div>

                <div class="manufact-pdAdbox">
                    <div class="w1300 zoom">
                        <h2 class="hidden">ヘルスケア製品</h2>
                        <a class="pdlink" href="diseaseprevention#pdsection-01">
                            <span class="pd-data">
                                <span class="tit fs_36 fw_500">ヘルスケア製品</span>
                                <span class="subtit fs_16">Products</span>
                                <span class="text fs_16">さらに優れた医薬品の研究開発と製造能力を卓越します</span>
                            </span>
                            <span class="bg-img jqimgFill"><img src="/styles/images/manufacturing/pd-ad-03.png" alt=""></span>
                        </a>
                    </div>
                </div>

HTML;

        $facturingIdEditor20 = <<<HTML

                <div class="page-bt-linkbox">
                    <div class="bg-img jqimgFill"><img src="/styles/images/research/research-13.jpg" alt=""></div>
                    <div class="w1100 zoom">
                        <h2 class="hidden">お問い合わせ</h2>
                        <a href="/contact">
                            <span class="link-data">
                                <span class="tit fs_28 fw_500" style="color:#fff">お問い合わせ</span>
                                <span class="subtit fs_16" style="color:#fff">Contact</span>
                                <span class="text fs_16" style="color:#fff">ご不明な点がございましたら、お気軽にお問い合わせください</span>
                            </span>
                        </a>
                    </div>
                </div>

HTML;





        $data = [
            ['id' => $articleElementManufacturingId1, 'title' => '高品質の機能製品を生産できる生物医学技術','details' => json_encode(['editor' => $facturingIdEditor1])],
            ['id' => $articleElementManufacturingId2, 'title' => '医薬品レベルの生産','details' => json_encode(['editor' => $facturingIdEditor2])],
            ['id' => $articleElementManufacturingId3, 'title' => 'OEM/ODM機能保健商品の生産プロセス','details' => json_encode(['editor' => $facturingIdEditor3])],
            ['id' => $articleElementManufacturingId4, 'title' => '栽培原料・栽培加工環境','details' => json_encode(['editor' => $facturingIdEditor4])],
            ['id' => $articleElementManufacturingId5, 'title' => '在来種の完全な保存','details' => json_encode(['editor' => $facturingIdEditor5])],
            ['id' => $articleElementManufacturingId6, 'title' => '業界最高の特許取得済み生産技術','details' => json_encode(['editor' => $facturingIdEditor6])],
            ['id' => $articleElementManufacturingId7, 'title' => '研究センター-277種のキノコ','details' => json_encode(['editor' => $facturingIdEditor7])],
            ['id' => $articleElementManufacturingId8, 'title' => '健康に有益な成分に関する研究','details' => json_encode(['editor' => $facturingIdEditor8])],
            ['id' => $articleElementManufacturingId9, 'title' => '安全で信頼性の高い製品を作る','details' => json_encode(['editor' => $facturingIdEditor9])],
            ['id' => $articleElementManufacturingId10, 'title' => 'きのこ菌糸栽培プロセス','details' => json_encode(['editor' => $facturingIdEditor10])],
            ['id' => $articleElementManufacturingId11, 'title' => 'EACはマウスモデルの腫瘍増殖を抑えた','details' => json_encode(['editor' => $facturingIdEditor11])],
            ['id' => $articleElementManufacturingId19, 'title' => 'EACはマウスモデルの腫瘍増殖を抑えた','details' => json_encode(['editor' => $facturingIdEditor19])],


            ['id' => $articleElementManufacturingId12, 'title' => '幹細胞、免疫療法、炎症免疫療法','details' => json_encode(['editor' => $facturingIdEditor12])],
            ['id' => $articleElementManufacturingId13, 'title' => '研究プロセス','details' => json_encode(['editor' => $facturingIdEditor13])],
            ['id' => $articleElementManufacturingId14, 'title' => '再生医療センター','details' => json_encode(['editor' => $facturingIdEditor14])],
            ['id' => $articleElementManufacturingId15, 'title' => '分析のための主な機器-品質と安全性の検査','details' => json_encode(['editor' => $facturingIdEditor15])],
            ['id' => $articleElementManufacturingId16, 'title' => 'ドナースクリーニング','details' => json_encode(['editor' => $facturingIdEditor16])],
            ['id' => $articleElementManufacturingId17, 'title' => '品質管理と品質認証','details' => json_encode(['editor' => $facturingIdEditor17])],
            ['id' => $articleElementManufacturingId18, 'title' => 'CPCトレーニングルーム','details' => json_encode(['editor' => $facturingIdEditor18])],
            ['id' => $articleElementManufacturingId20, 'title' => 'CPCトレーニングルーム','details' => json_encode(['editor' => $facturingIdEditor20])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId5, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId6, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId7, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId8, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId9, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId10, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId11, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_1, 'object_id' => $articleElementManufacturingId19, 'model' => 'Minmax\Article\Models\ArticleElement'],

            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId12, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId13, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId14, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId15, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId16, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId17, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId18, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId3_2, 'object_id' => $articleElementManufacturingId20, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
