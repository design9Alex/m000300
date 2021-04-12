<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;
use Minmax\Ad\Web\AdvertisingRepository;

/**
 * Class AboutController
 */
class AboutController extends BaseController
{

    public function __construct(){
        parent::__construct();

        //$this->viewData['bannerData'] = $this->getPageBanner('8ddZTD4tQ0SY4ij3');

    }

    public function about()
    {
        $this->viewData['thisMenu'] = 'about';
        $this->viewData['mainMenuData'] = $mainMenuData = $this->getMainMenuData($this->viewData['thisMenu']);


        $mainMenuDataPic = array();
        foreach(array_get($mainMenuData,'details.pic') as $key => $item){
            $mainMenuDataPic[array_get($item,'device')] = array_get($item,'path');
        }
        $this->viewData['mainMenuDataPic'] = $mainMenuDataPic;

        $seo = array();
        $seo['title'] = $this->viewData['mainMenuData']->title;
        $seo['description'] = array_get($this->viewData['mainMenuData'],'seo.meta_description');
        $seo['keywords'] = array_get($this->viewData['mainMenuData'],'seo.meta_keywords');


        $this->viewData['seo'] = $seo;

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('about')->get();

        return response()
            ->view('web.about', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
