<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementProductSeeder extends Seeder
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
        $categoryId4 = DB::table('article_category')->where('uri', 'cellregeneration')->value('id');


        //新增資料
        $articleElementData = [

            //細胞再生 cellregeneration
            ['id' => $articleElementCellregenerationId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId1, 'details' => 'article_element.details.'.$articleElementCellregenerationId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId2, 'details' => 'article_element.details.'.$articleElementCellregenerationId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['id' => $articleElementCellregenerationId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId3, 'details' => 'article_element.details.'.$articleElementCellregenerationId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId4, 'details' => 'article_element.details.'.$articleElementCellregenerationId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId5, 'details' => 'article_element.details.'.$articleElementCellregenerationId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId6, 'details' => 'article_element.details.'.$articleElementCellregenerationId6, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId7 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId7, 'details' => 'article_element.details.'.$articleElementCellregenerationId7, 'sort' => 7, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementCellregenerationId8 = uuidl(), 'title' => 'article_element.title.'.$articleElementCellregenerationId8, 'details' => 'article_element.details.'.$articleElementCellregenerationId8, 'sort' => 8, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
        ];
        DB::table('article_element')->insert($articleElementData);

        $cellregenerationEeditor1 = <<<HTML
        <div class="page-textbox">
                    <div class="w915 box">
                        <h2 class="tag darkgray fs_28 fw_bold">幹細胞は多方向の分化能力と自己再生能力を持っている</h2>
                        <p class="text fs_16">幹細胞は、ヒトの胚、骨髄、臍帯、脂肪、その他の組織に由来し、それ自体と同じ細胞とさまざまな特定の機能を持つ別の細胞に分化できる能力を持っています。 今日、医学は病気の治療、組織や臓器細胞の再生、損傷の修復など分野において、よく使用され、多くの成功した臨床例があります。 将来の医学発展において、幹細胞は老化防止医学、癌治療、火傷、および病気の医学に対して極めて重要な役割を果たすことを期待しています。</p>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor2 = <<<HTML
        <div class="cell-char lightblue-bg">
                    <div class="w1300">
                        <div class="scriptbox middle">
                            <h2 class="tit dash fw_bold fs_28">幹細胞の特徴</h2>
                        </div>
                        <div class="cell-charbox">
                            <div class="subtit fs_16 fw_500">まだ分​​化しておらず、自己再生および増殖し、さまざまな成熟組織に分化する能力を有する原始細胞</div>
                            <div class="zoom">
                                <div class="databox">
                                    <div class="item">
                                        <!-- 圖片尺寸 w405 * h257 -->
                                        <div class="img"><img src="/styles/images//product/cell/cell-01.gif?0204" alt=""></div>
                                        <div class="wordbox">
                                            <div class="tag">
                                                <!-- <span class="icon"><img src="/styles/images//common/icon-arrow-right-orange.svg" alt=""></span> -->
                                                <span class="fs_18 fw_bold">更新繁殖（自己更新）</span>
                                            </div>
                                            <p class="word fs_16">幹細胞は自己増殖する能力があり、再生や組織修復を行うために使用したのと同じ細胞に増殖することができます。</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <!-- 圖片尺寸 w405 * h257 -->
                                        <div class="img"><img src="/styles/images//product/cell/cell-02.gif?0204" alt=""></div>
                                        <div class="wordbox">
                                            <div class="tag">
                                                <!-- <span class="icon"><img src="/styles/images//common/icon-arrow-right-orange.svg" alt=""></span> -->
                                                <span class="fs_18 fw_bold">差別化の能力</span>
                                            </div>
                                            <p class="word fs_16">各特定機能を持つ細胞へ分化することができます。細胞の代替や再生作業を行います。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor3 = <<<HTML
        <div class="cell-repair">
                    <div class="w1300">
                        <div class="scriptbox middle">
                            <h2 class="tit fw_bold fs_28" data-aos="fade-up">皮膚の外傷および老化による損傷に対する表皮および真皮幹細胞の修復力 </h2>
                        </div>
                        <div class="cell-repairbox" data-aos="fade" data-aos-delay="400">
                            <span class="imgbox">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="styles/images/product/cell/cell-03_mobile.gif"/>
                                    <!-- 圖片尺寸  w920 * h670 -->
                                    <img src="/styles/images//product/cell/cell-03.gif" alt=""/><!-- 圖片尺寸  w920 * h670 -->
                                </picture>
                            </span>
                        </div>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor4 = <<<HTML
        <div class="cell-section lightblue-bg">
                    <div class="w1300">
                        <div class="zoom cell-quality">
                            <div class="content">
                                <div class="indata">
                                    <div class="scriptbox">
                                        <h2 class="tit dash fw_bold fs_28">細胞品質の確認</h2>
                                        <div class="text fs_16">これは、新しい臨床薬の開発、病気の治療、美容上の外傷、および医学的臨床研究において、医療部門によって利用されています。 動物由来の成分は、栽培過程で厳禁されています。 初代培養から第10世代の幹細胞まで、臨床研究機関が要求する細胞品質を確保するために、厳格なDAG培養管理ガイドライン（医薬品製造グレード仕様）が実施されています。</div>
                                    </div>
                                    <p class="fs_16 gray fw_bold lh-175 pt-3 mt-sm-4">医療用の無血清栽培は、必要なGCTP無菌性およびエンドトキシンテストに合格しています。</p>
                                    <ul class="ul-style pt-2">
                                        <li class="fs_16 orange"><p class="gray">細胞/組織保存液には動物成分は使用されていません。</p></li>
                                        <li class="fs_16 orange"><p class="gray">動物 由来のタンパク質を含まないため、細胞製品の収量と品質が向上します。</p></li>
                                        <li class="fs_16 orange"><p class="gray">無血清栽培を使用したうえ、培養の安定性を向上させます。</p></li>
                                    </ul>
                                    <div class="listgroup">
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-01.jpg" title="遺伝子発現">
                                                <span class="fs_16">遺伝子発現</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-02.jpg" title="細胞因子の種類と量">
                                                <span class="fs_16">細胞因子の種類と量</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-03.jpg" title="細胞増殖の特性">
                                                <span class="fs_16">細胞増殖の特性</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-04.jpg" title="細胞表面マーカー">
                                                <span class="fs_16">細胞表面マーカー</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pic jqimgFill" data-aos="fade"><img src="/styles/images//product/cell/cell-04.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor5 = <<<HTML
        <div class="cell-section">
                    <div class="w1300">
                        <div class="zoom cell-clinicalcases">
                            <div class="content">
                                <div class="indata">
                                    <div class="scriptbox">
                                        <h2 class="tit dash fw_bold fs_28">臨床治療症例の説明</h2>
                                        <div class="text fs_16">日本と台湾の医療チームは、共同に脂肪由来間葉幹細胞を使用して、火傷および熱傷皮膚再生、膝軟骨再生、アルツハイマー病、脳卒中、神経損傷、および毛髪再生を含む6つの医学的臨床研究プロジェクトを実施しました。</div>
                                    </div>
                                    <div class="listgroup">
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-05.jpg" title="血管壁狭窄の臨床研究">
                                                <span class="fs_16">血管壁狭窄の臨床研究 </span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-06.jpg" title="育毛臨床研究">
                                                <span class="fs_16">育毛臨床研究</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                        <div class="elelink">
                                            <a class="picgallery" href="/styles/images/product/cell/cell-group-07.jpg" title="膝軟骨変性症の臨床試験">
                                                <span class="fs_16">膝軟骨変性症の臨床試験</span>
								                <span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="fs_16 h-175 pt-3" style="color:#6C6C6C;">*420以上の臨床事例、研究項目：皮膚再生、膝、発毛、炎症、神  経修復。</p>
                                </div>
                            </div>
                            <div class="pic jqimgFill" data-aos="fade"><img src="/styles/images//product/cell/cell-05.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor6 = <<<HTML
        <div class="cell-oem lightblue-bg">
                    <div class="w1300">
                        <div class="scriptbox middle">
                            <h2 class="tit dash fw_bold fs_28" data-aos="fade-up">幹細胞のOEM製造プロセス</h2>
                        </div>
                        <div class="cell-oembox" data-aos="fade-up">
                            <div class="chart-flow">
                                <table class="oemtree">
                                    <tr>
                                        <th>
                                            <div class="logo" data-aos="fade"><img src="/styles/images//product/cell/oem-icon-01.svg" alt=""></div>
                                        </th>
                                        <th></th>
                                        <th>
                                            <div class="logo" data-aos="fade"><img src="/styles/images//product/cell/oem-icon-02.svg" alt=""></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="item" data-aos="fade-up">
                                                <div class="step">
                                                    <div class="stepno poppins fs_16 fw_bold">STEP 1</div>
                                                    <div class="stepin fs_16 fw_500 gray">約20mLの脂肪の収集</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="item" data-aos="fade-up">
                                                <div class="arrow"></div>
                                                <div class="transit fs_15 fw_500">製品の配送</div>
                                                <div class="arrow"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="item" data-aos="fade-up">
                                                <div class="process twice fs_16 fw_500">ソース検出</div>
                                                <div class="arrow twice"></div>
                                                <div class="process twice dashdown fs_16 fw_500">処理</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="item branch" data-aos="fade-up">
                                                <div class="arrowdown"></div>
                                                <div class="process fs_16 fw_500">無菌試驗、發熱性物質試驗、生物學的試驗</div>
                                                <div class="angledown"></div>
                                                <div class="process fs_16 fw_500">液体窒素凍結保存</div>
                                                <div class="angledown"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="item" data-aos="fade-up">
                                                <div class="step">
                                                    <div class="stepno poppins fs_16 fw_bold">STEP 2</div>
                                                    <div class="stepin fs_16 fw_500 gray">幹細胞抽出時間の通知</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="item" data-aos="fade-up">
                                                <div class="arrow"></div>
                                                <div class="transit fs_15 fw_500">製品の注文</div>
                                                <div class="arrow"></div>
                                            </div>
                                        </td>
                                        <td rowspan="2" class="last" data-aos="fade-up">
                                            <div class="item">
                                                <div class="process fs_16 fw_500">配達の手配</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="endstep">
                                            <div class="item" data-aos="fade-up">
                                                <div class="step">
                                                    <div class="stepno poppins fs_16 fw_bold">STEP 3</div>
                                                    <div class="stepin fs_16 fw_500 gray">培養幹細胞は臨床試験と治療を受けます</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="endstep">
                                            <div class="item" data-aos="fade-up">
                                                <div class="arrow reverse"></div>
                                                <div class="transit fs_15 fw_500">製品の配送</div>
                                                <div class="arrow reverse"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="oem-chart">
                                <div class="list" data-aos="fade-up" data-aos-delay="150">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-03.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_16 fw_500">脂肪抽出</p></div>
                                    </div>
                                </div>
                                <div class="list" data-aos="fade-up" data-aos-delay="300">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-04.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_14 fw_500">第一世代の母細胞<br/>の抽出</p></div>
                                    </div>
                                </div>
                                <div class="list" data-aos="fade-up" data-aos-delay="450">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-05.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_14 fw_500">細胞増殖（第2世<br/>代から第10世代）</p></div>
                                    </div>
                                </div>
                                <div class="list" data-aos="fade-up" data-aos-delay="600">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-06.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_14 fw_500">リポソームコーテ<br/>ィング技術</p></div>
                                    </div>
                                </div>
                                <div class="list" data-aos="fade-up" data-aos-delay="750">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-07.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_16 fw_500">品質検査</p></div>
                                    </div>
                                </div>
                                <div class="list" data-aos="fade-up" data-aos-delay="900">
                                    <div class="item">
                                        <div class="imgbox"><img src="/styles/images//product/cell/oem-icon-08.jpg" alt=""></div>
                                        <div class="textbox"><p class="fs_14 fw_500">長期保管のために<br/>液体窒素に入れます</p></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $cellregenerationEeditor7 = <<<HTML
        <div class="cell-medicine">
                    <div class="w1300">
                        <div class="scriptbox middle">
                            <h2 class="tit fw_bold fs_28">再生医療の提供（臨床研究・治療）</h2>
                        </div>
                        <div class="cell-medicinebox">
                            <p class="text fs_16 gray text-center">再生医療の臨床研究や治療を行うためには、技術のリスク分類（タイプ1、タイプ2、タイプ3）に対応した再生医療提供計画を作成し、再生医療に関連する認証を取得します。 また、委員会（タイプ1およびタイプ2特定認証の再生医療委員会）による審査をうけ、再生医療の提供計画を厚生労働大臣に提出する必要があります。</p>
                            <div class="chartbox">
                                <div class="medicine-chart">
                                    <div class="item first">
                                        <div class="databox" style="background:#1392CF;">
                                            <span class="fs_18">第一種・第二種・第三種再生医療等技術</span>
                                        </div>
                                        <div class="arrow"></div>
                                    </div>
                                    <div class="tree">
                                        <div class="tree-row">
                                            <div class="item branch">
                                                <div class="databox" style="background:#0B62AF;">
                                                    <span class="fs_18">計画</span>
                                                </div>
                                                <div class="arrow"></div>
                                            </div>
                                            <div class="item">
                                                <div class="databox" style="background:#1590CC;">
                                                    <span class="fs_18">認定</span>
                                                </div>
                                                <div class="arrow"></div>
                                            </div>
                                            <div class="item branch">
                                                <div class="databox" style="background:#7AC8EF;">
                                                    <span class="fs_18">審査</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tree-row branch">
                                            <div class="item last">
                                                <div class="databox" style="background:#52B2D3;">
                                                    <span class="fs_18">第一種・第二種の場合は特定認定再生医療等委員会</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;


        $cellregenerationEeditor8 = <<<HTML

                <div class="page-bt-linkbox">
                    <div class="bg-img jqimgFill"><img src="/styles/images/product/cell-contact.jpg" alt=""></div>
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
            ['id' => $articleElementCellregenerationId1, 'title' => '幹細胞は多方向の分化能力と自己再生能力を持っている','details' => json_encode(['editor' => $cellregenerationEeditor1])],
            ['id' => $articleElementCellregenerationId2, 'title' => '幹細胞の特徴','details' => json_encode(['editor' => $cellregenerationEeditor2])],
            ['id' => $articleElementCellregenerationId3, 'title' => '皮膚の外傷および老化による損傷に対する表皮および真皮幹細胞の修復力','details' => json_encode(['editor' => $cellregenerationEeditor3])],
            ['id' => $articleElementCellregenerationId4, 'title' => '細胞品質の確認','details' => json_encode(['editor' => $cellregenerationEeditor4])],
            ['id' => $articleElementCellregenerationId5, 'title' => '臨床治療症例の説明','details' => json_encode(['editor' => $cellregenerationEeditor5])],
            ['id' => $articleElementCellregenerationId6, 'title' => '幹細胞のOEM製造プロセス','details' => json_encode(['editor' => $cellregenerationEeditor6])],
            ['id' => $articleElementCellregenerationId7, 'title' => '再生医療の提供（臨床研究・治療）','details' => json_encode(['editor' => $cellregenerationEeditor7])],
            ['id' => $articleElementCellregenerationId8, 'title' => 'お問い合わせ','details' => json_encode(['editor' => $cellregenerationEeditor8])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId5, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId6, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId7, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId4, 'object_id' => $articleElementCellregenerationId8, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
