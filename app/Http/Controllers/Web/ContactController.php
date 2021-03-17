<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;

/**
 * Class AboutController
 */
class ContactController extends BaseController
{

    public function __construct(){
        parent::__construct();

        //$this->viewData['bannerData'] = $this->getPageBanner('8ddZTD4tQ0SY4ij3');

    }

    public function contact()
    {
        $this->viewData['thisMenu'] = 'contact';
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

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('contact')->get();

        $this->viewData['serviceItem'] = $serviceItem = siteParam('service-item');   //諮詢服務
        $this->viewData['participation'] = $participation = siteParam('participation');   //參加類別
        $this->viewData['countrys'] = $countrys = siteParam('country');        //國家
        $this->viewData['contactItem'] = $contactItem = siteParam('contact-item');   //項目

        return response()
            ->view('web.contact', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
