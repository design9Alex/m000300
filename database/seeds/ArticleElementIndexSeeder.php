<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class ArticleElementIndexSeeder extends Seeder
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
        $categoryId5 = DB::table('article_category')->where('uri', 'home')->value('id');


        //新增資料
        $articleElementData = [

            ['id' => $articleElementId1 = uuidl(), 'title' => 'article_element.title.'.$articleElementId1, 'details' => 'article_element.details.'.$articleElementId1, 'sort' => 1, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId2 = uuidl(), 'title' => 'article_element.title.'.$articleElementId2, 'details' => 'article_element.details.'.$articleElementId2, 'sort' => 2, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId3 = uuidl(), 'title' => 'article_element.title.'.$articleElementId3, 'details' => 'article_element.details.'.$articleElementId3, 'sort' => 3, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],
            ['id' => $articleElementId4 = uuidl(), 'title' => 'article_element.title.'.$articleElementId4, 'details' => 'article_element.details.'.$articleElementId4, 'sort' => 4, 'active' => true, 'created_at' => $this->timestamp, 'updated_at' => $this->timestamp],


        ];
        DB::table('article_element')->insert($articleElementData);

        $editor1 = <<<HTML

			<div class="home-banner">
				<div class="banner">
					<div class="slider" data-aos="fade">
						<!-- 圖片尺寸 w1920 * h820 -->
						<div class="item jqimgFill rellax" data-rellax-speed="3" data-rellax-xs-speed="1" data-rellax-mobile-speed="2"
                data-rellax-tablet-speed="2">
							<img src="/styles/images/index/banner01.jpg" alt="">
							<div class="text-box">
								<p class="word fs_24">高純度のサケDNAにより、表皮細胞の成長活性を促進し、皮膚のコラーゲン、皮膚の弾力性、およびヒアルロン酸を再生します。</p>
							</div>
						</div>
						<div class="item jqimgFill rellax" data-rellax-speed="3" data-rellax-xs-speed="1" data-rellax-mobile-speed="2"
                data-rellax-tablet-speed="2">
						 	<img src="/styles/images/index/banner02.jpg" alt="">
							<div class="text-box darkbg">
								<p class="word white fs_24">
									<span class="d-block">免疫医学および自然医学</span>
									<span class="d-block">に関する機能性製品の研究開発</span>
								</p>
							</div>
						</div>
						<div class="item jqimgFill rellax" data-rellax-speed="3" data-rellax-xs-speed="1" data-rellax-mobile-speed="2"
                data-rellax-tablet-speed="2">
							<img src="/styles/images/index/banner03.jpg" alt="">
							<div class="text-box">
								<p class="word white fs_24">修復外用ゲルシリーズ：特に癒しにくい創傷の治癒のために開発され糖尿病や湿疹やニキビによる皮膚の問題を対応できる</p>
							</div>
						</div>
					</div>
				</div>
			</div>
HTML;

        $editor2 = <<<HTML
        <div class="home-section home-about">
				<div class="zoom">
					<div class="scriptbox" data-aos="fade-right">
						<h2 class="tit dash fw_bold fs_28">私たちについて</h2>
						<div class="text fs_16">私たちは、常に患者のメリットを優先するというスタンスから、考えて行動します。また、研究から製造までいつも厳格な態度を持ち、ディテールと品質のこだわりを追求します。</div>
						<div class="readmore">
							<a href="about">
								<span class="fs_16">詳しく⾒る</span>
								<span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-blue.svg" alt="arrow"></span>
							</a>
						</div>
					</div>
					<div class="pic jqimgFill" data-aos="fade-left" data-aos-delay="300"><img src="/styles/images//index/index-about.jpg" alt=""></div>
				</div>
			</div>
HTML;

        $editor3 = <<<HTML
        <div class="home-section home-products">
				<div class="pd-bn">
					<div class="bg-img jqimgFill"><img src="/styles/images//index/index-pd-bn.jpg" alt=""></div>
					<div class="zoom">
						<div class="scriptbox">
							<h2 class="tit dash fw_bold fs_28">高品質の製品</h2>
							<div class="text fs_16">薬理学に基づき、協調な活性と相乗効果を運用し、諸開発ができました。さらに、科学的実験、有効性と実用な数値的な性能を通じて、慢性疾患予防研究システムを確立し、全面的なフォローアップ評価計画が確立されてきました。</div>
						</div>
					</div>
				</div>
				<div class="pd-box">
					<div class="zoom">
						<div class="scriptbox">
							<h2 class="tit dash fw_bold fs_28" data-aos="fade-up">4つの主な事業分野</h2>
							<div class="text fs_16" data-aos="fade-up">私たちの製品は、美容医学、細胞再生、病気の予防、病気の治療の4つの分野を対象としています。 また、これらのカテゴリーに関連する医療機器の販売も行っている。 私たちは、産業界と学界の間のコラボレーションに基づき、強力なコンピテンシーを構築してきた"</div>
							<div class="downarrow" data-aos="fade-up"><img src="/styles/images//common/icon-arrow-down-blue.svg" alt="arrow"></div>
						</div>
						<div class="pd-list" >
							<div class="item" data-aos="fade-up">
								<h3 class="tag fs_20">細胞再生</h3>
								<a href="cellregeneration">
									<span class="pic jqimgFill"><img src="/styles/images//index/index-pd-01.jpg" alt="">
										<span class="databox">
											<span class="tit">細胞再生</span>
											<span class="script fs_16">脂肪由来幹細胞を採用し、火傷された皮膚の再生、膝軟骨の再生、アルツハイマー病、脳卒中、神経損傷、髪の再生など、6つの医学的病理に関する臨床研究プロジェクトを行っています。</span>
										</span>
									</span>
								</a>
							</div>
							<div class="item" data-aos="fade-up">
								<h3 class="tag fs_20">医療美容</h3>
								<a href="estheticmedicine">
									<span class="pic jqimgFill"><img src="/styles/images//index/index-pd-02.jpg" alt="">
										<span class="databox">
											<span class="tit">医療美容</span>
											<span class="script fs_16">皮膚科医や整形美容外科医の医療美容ニードを満たすために、製薬の経験を以って、医療機器、材料、術後医療製品等分野まで広げてなりました。</span>
										</span>
									</span>
								</a>
							</div>
							<div class="item" data-aos="fade-up">
								<h3 class="tag fs_20">病気の予防</h3>
								<a href="diseaseprevention">
									<span class="pic jqimgFill"><img src="/styles/images//index/index-pd-03.jpg" alt="">
										<span class="databox">
											<span class="tit">病気の予防</span>
											<span class="script fs_16">予防または慢性疾患のための製品の開発と漢方薬自体の相乗効果の原理により、身体機能が改善され、予防効果が向上するのを図ります。また、多くの製品が新薬FDA PhaseIIプログラムに向けた動物臨床試験に合格しました。</span>
										</span>
									</span>
								</a>
							</div>
							<div class="item" data-aos="fade-up">
								<h3 class="tag fs_20">疾病の治療</h3>
								<a href="therapeutics">
									<span class="pic jqimgFill"><img src="/styles/images//index/index-pd-04.jpg" alt="">
										<span class="databox">
											<span class="tit">疾病の治療</span>
											<span class="script fs_16">ドイツでの治療臨床経験及び優しく革新な治療仕方は私たちを驚かせました。 関連医療製品の代理を通して、患者さんは薬を頼ること以外 、非侵襲的で効果がある治療オプションを選択することを通じて、病を抑えながら、健康を回復します。</span>
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
HTML;

        $editor4 = <<<HTML
        <div class="home-section home-therapy">
				<div class="zoom">
					<div class="scriptbox">
						<h2 class="tit dash fw_bold fs_28" data-aos="fade-up">自己血清サイトカイン増殖療法</h2>
						<div class="text fs_16" data-aos="fade-up">自分の血液を用いた血清治療です。血液分離剤や血液抗凝固剤、塩化カルシウムなどを使用せず、安全性が極めて高い。また、細胞を用いた治療法ではないですので、関連法律の規制を免れ、医師にとって導入がしやすいという大きな利点があります。また、老化防止及び医療美容領域の応用も期待されています。</div>
						<div class="downarrow" data-aos="fade-up"><img src="/styles/images//common/icon-arrow-down-blue.svg" alt="arrow"></div>
					</div>
				</div>
				<div class="linkbox">
					<div class="speechbox">
						<div class="bg-img jqimgFill">
							<img src="/styles/images//index/index-therapy-01.jpg" alt="">
							<div class="content">
								<div class="scriptbox" >
									<div class="tit en fs_28 fw_500">IMR-Immunomodulatory Regeneration Therapy</div>
									<h2 class="tit dash fs_28">免疫調節再生療法</h2>
									<div class="text fs_16">講者：辻　直樹（医療法人社団医献会　理事長 ）<br/>日付：8月9日（金）、10日（土）</div>
									<div class="readmore">
										<a href="about" class="">
											<span class="fs_16">申込をお願いいたします</span>
											<span class="icon"><img class="svg" src="/styles/images//common/icon-arrow-right-white.svg" alt="arrow"></span>
										</a>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="imgbox jqimgFill"><img src="/styles/images//index/index-therapy-02.jpg" alt=""></div>
				</div>

			</div>
HTML;




        $data = [
            ['id' => $articleElementId1, 'title' => '首頁','details' => json_encode(['editor' => $editor1])],
            ['id' => $articleElementId2, 'title' => '私たちについて','details' => json_encode(['editor' => $editor2])],
            ['id' => $articleElementId3, 'title' => '高品質の製品','details' => json_encode(['editor' => $editor3])],
            ['id' => $articleElementId4, 'title' => '自己血清サイトカイン増殖療法','details' => json_encode(['editor' => $editor4])],
        ];
        $articleTeamLanguage = ['ja' => $data, 'en' => $data];
        SeederHelper::setLanguageResource($this->languageResourceData, 'article_element', $articleTeamLanguage, $this->languageList, null, false);

        //文章及類別關聯
        $articleCategoryRelationData = [
            ['category_id' => $categoryId5, 'object_id' => $articleElementId1, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId5, 'object_id' => $articleElementId2, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId5, 'object_id' => $articleElementId3, 'model' => 'Minmax\Article\Models\ArticleElement'],
            ['category_id' => $categoryId5, 'object_id' => $articleElementId4, 'model' => 'Minmax\Article\Models\ArticleElement'],
        ];
        DB::table('article_category_relation')->insert($articleCategoryRelationData);

    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }
}
