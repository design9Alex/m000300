<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementAboutSeeder extends Seeder
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
        $categoryId2 = DB::table('article_category')->where('uri', 'about')->value('id');


        //新增資料
        $articleElementData = [

            //關於我們
            ['id' => $articleElementAboutId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId1, 'details' => 'article_element.details.'.$articleElementAboutId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementAboutId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId2, 'details' => 'article_element.details.'.$articleElementAboutId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

            ['id' => $articleElementAboutId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId3, 'details' => 'article_element.details.'.$articleElementAboutId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementAboutId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId4, 'details' => 'article_element.details.'.$articleElementAboutId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementAboutId5 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId5, 'details' => 'article_element.details.'.$articleElementAboutId5, 'sort' => 5, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementAboutId6 = uuidl(), 'title' => 'article_element.title.'.$articleElementAboutId6, 'details' => 'article_element.details.'.$articleElementAboutId6, 'sort' => 6, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],

        ];
        DB::table('article_element')->insert($articleElementData);

        $aboutEditor1 = <<<HTML
        <div class="page-textbox">
                    <div class="w915 box">
                        <h2 class="tag darkgray fs_28 fw_bold">あなたが世界で見るものを変えること</h2>
                        <p class="text fs_16">私たちが生産する製品は、美容医学、細胞再生、病気の予防、病気の治療の4つの主要分野を対象としています。 また、各分野に関連する医療機器の小売りも行っています。また、私たちは、産業界と学界の間のコラボレーションに基づき、強力なコアコンピテンシーのセットを構築しました。 これは、医師が臨床的および科学的データに基づいて安全且つ効果的な製品を確実に受け取れるようにするためです。</p>
                    </div>
                </div>
HTML;

        $aboutEditor2 = <<<HTML
        <div class="about-blocks about-industrial">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="styles/images/about/about-01.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="zoom">
                            <div class="pagetextbox" data-aos="fade">
                                <h2 class="tit dash fw_bold fs_24">産業的に</h2>
                                <div class="text fs_16">リーディングな大手製薬組織として、私たちは自分のブランドをグローバルに発展させることに関して全力で取り組んでいます。 また、世界中の医療、健康、福祉製品を幅広い医療専門家や専門家に提供しています。</div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $aboutEditor3 = <<<HTML
        <div class="about-blocks about-academic">
                    <div class="bg-img jqimgFill" data-aos="fade"><img src="styles/images/about/about-02.jpg" alt=""></div>
                    <div class="w1300">
                        <div class="zoom">
                            <div class="pagetextbox" data-aos="fade">
                                <h2 class="tit dash fw_bold fs_24">学術的に</h2>
                                <div class="text fs_16">私たちは医院と協力して新薬研究を提供し、SCI Medical Journalsを発行し、国際医療会議に参加しています。</div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $aboutEditor4 = <<<HTML
        <div class="about-enterprise">
                    <div class="w1300 zoom">
                        <div class="scriptbox middle">
                            <h2 class="tit dash fw_bold fs_28" data-aos="fade-up">企業の強み</h2>
                        </div>
                        <div class="strength-list">
                            <div class="item">
                                <div class="ciclebox" style="color:rgba(50,149,207,1);" data-aos="zoom-in">
                                    <span class="icon-plus"><img src="styles/images/about/icon-plus.svg" alt=""></span>
                                    <span class="text fs_20">私たちのビジョン</span>
                                    <span class="icon"><img src="styles/images/about/enterprise-01.svg" alt=""></span>
                                </div>
                                <div class="databox" style="color:rgba(50,149,207,1);" data-aos="fade-up">
                                    <p class="word fs_16">私たちのビジョンは、人々の活力と生活の質を維持しながら、老化の過程をガイドすることです。</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ciclebox" style="color:rgba(0,35,113,0.75);" data-aos="zoom-in" data-aos-delay="100">
                                    <span class="icon-plus"><img src="styles/images/about/icon-plus.svg" alt=""></span>
                                    <span class="text fs_20">私たちの使命</span>
                                    <span class="icon"><img src="styles/images/about/enterprise-02.svg" alt=""></span>
                                </div>
                                <div class="databox" style="color:#1B478E;" data-aos="fade-up" data-aos-delay="100">
                                    <p class="word fs_16">人類に利益をもたらす製品のみを造ります。</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ciclebox" style="color:rgba(0,0,0,0.28);" data-aos="zoom-in" data-aos-delay="200">
                                    <span class="icon-plus"><img src="styles/images/about/icon-plus.svg" alt=""></span>
                                    <span class="text fs_20">ビジネス哲学</span>
                                    <span class="icon"><img src="styles/images/about/enterprise-03.svg" alt=""></span>
                                </div>
                                <div class="databox" style="color:#BFBFBF;" data-aos="fade-up" data-aos-delay="200">
                                    <p class="word fs_16">1.顧客の期待を超えるサビースを  提供すること。2.お客様との長期的な信頼関係を築くこと。3.クライアントと共感し、ニーズを理解し、問題を解決すること。</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="ciclebox" style="color:rgba(36,157,216,0.65);" data-aos="zoom-in" data-aos-delay="300">
                                    <span class="icon-plus"><img src="styles/images/about/icon-plus.svg" alt=""></span>
                                    <span class="text fs_20">私たちのサービス</span>
                                    <span class="icon"><img src="styles/images/about/enterprise-04.svg" alt=""></span>
                                </div>
                                <div class="databox" style="color:#87C5E4;" data-aos="fade-up" data-aos-delay="300">
                                    <p class="word fs_16">1.市場でユニークな高品質で革新的な製品を提供すること。2.医師を支援し、スキルを向上させ、医療分野での知識を拡大すること。3.患者の信頼を確立するために、医師の評判を高めること。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
HTML;

        $aboutEditor5 = <<<HTML
        <div class="about-section about-dds">
                    <div class="half-pic jqimgFill" data-aos="fade"><img src="styles/images/about/about-dds-01.jpg" alt=""></div>
                    <div class="databox">
                        <div class="scriptbox" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">ドラッグデリバリーシステム（DDS）</h2>
                            <div class="text fs_16">これには、当社の事業開発プロジェクトに特許取得済みのドラッグデリバリー技術を適用することが含まれます。 DDSは、特許取得済みのNDS皮膚浸透システム、水溶性の透過性並びに吸収性エンハンサーなど、適応性の高い小分子輸送するという特性を備えています。 DDS伝達技術は、主に製品の皮膚伝達に使用され、局所的な皮膚の症状を改善し、初回通過効果を回避します。また、安全に使用でき、皮膚からの製品の適切な浸透を実現できます。</div>
                        </div>
                    </div>
                    <div class="pic jqimgFill" data-aos="fade"><img src="styles/images/about/about-dds-02.jpg" alt=""></div>
                </div>
HTML;

        $aboutEditor6 = <<<HTML
        <div class="about-section about-src">
                    <div class="half-pic jqimgFill" data-aos="fade"><img src="styles/images/about/about-src-02.jpg" alt=""></div>
                    <div class="databox">
                        <div class="scriptbox" data-aos="fade">
                            <h2 class="tit dash fw_bold fs_24">皮膚研究センター</h2>
                            <div class="text fs_16">間葉系幹細胞は、皮膚細胞や血管細胞など、さまざまな成体細胞に変化できる原始細胞です。 間葉系幹細胞製品の開発のために、火傷や熱傷の治療に臨床経験と技術を導入しました。 これらの製品は、皮膚の老化防止というニーズを満たすために皮膚のケラチノサイトを刺激する成分を含みます。</div>
                        </div>
                    </div>
                    <div class="pic jqimgFill" data-aos="fade"><img src="styles/images/about/about-src-01.jpg" alt=""></div>
                </div>
HTML;




        $data = [
            ['id' => $articleElementAboutId1, 'title' => 'あなたが世界で見るものを変えること','details' => json_encode(['editor' => $aboutEditor1])],
            ['id' => $articleElementAboutId2, 'title' => '産業的に','details' => json_encode(['editor' => $aboutEditor2])],
            ['id' => $articleElementAboutId3, 'title' => '学術的に','details' => json_encode(['editor' => $aboutEditor3])],
            ['id' => $articleElementAboutId4, 'title' => '企業の強み','details' => json_encode(['editor' => $aboutEditor4])],
            ['id' => $articleElementAboutId5, 'title' => 'ドラッグデリバリーシステム（DDS）','details' => json_encode(['editor' => $aboutEditor5])],
            ['id' => $articleElementAboutId6, 'title' => '皮膚研究センター','details' => json_encode(['editor' => $aboutEditor6])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId5, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId2, 'object_id' => $articleElementAboutId6, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
