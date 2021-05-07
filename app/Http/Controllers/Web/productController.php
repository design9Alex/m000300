<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;
use Minmax\Ad\Web\AdvertisingCategoryRepository;
use Minmax\Ad\Web\AdvertisingRepository;

/**
 * Class productController
 */
class productController extends BaseController
{

    public function __construct(){
        parent::__construct();

    }

    public function product($uri)
    {
        $this->viewData['thisMenu'] = $thisMenu = $uri;
        $this->viewData['mainMenuData'] = $mainMenuData = $this->getMainMenuData($thisMenu);
        $this->viewData['tagID']  = $thisMenu;

        $mainMenuDataPic = array();
        foreach(array_get($mainMenuData,'details.pic') as $key => $item){
            $mainMenuDataPic[array_get($item,'device')] = array_get($item,'path');
        }
        $this->viewData['mainMenuDataPic'] = $mainMenuDataPic;

        $seo = array();
        $seo['title'] = $this->viewData['PageTitle'] = $this->viewData['mainMenuData']->title;
        $seo['description'] = array_get($this->viewData['mainMenuData'],'seo.meta_description');
        $seo['keywords'] = array_get($this->viewData['mainMenuData'],'seo.meta_keywords');


        $this->viewData['seo'] = $seo;

        //$this->viewData['bannerData'] = $bannerData = (new AdvertisingRepository())->getAdvertising('product_banner','10');
        //$this->viewData['advertising'] = $advertising = (new AdvertisingRepository())->getAdvertising('product_advertising','10');

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory($uri)->get();


        return response()
            ->view('web.product', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }





}
