<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;
use Minmax\Ad\Web\AdvertisingRepository;

/**
 * Class AboutController
 */
class manufacturingController extends BaseController
{

    public function __construct(){
        parent::__construct();

    }

    public function manufacturing()
    {

        $this->viewData['thisMenu'] = 'manufacturing';
        $this->viewData['mainMenuData'] = $mainMenuData = $this->getMainMenuData($this->viewData['thisMenu']);

        $mainMenuDataPic = array();
        foreach(array_get($mainMenuData,'details.pic') as $key => $item){
            $mainMenuDataPic[array_get($item,'device')] = array_get($item,'path');
        }
        $this->viewData['mainMenuDataPic'] = $mainMenuDataPic;
        //dd(array_get($mainMenuData,'details.pic'));


        $seo = array();
        $seo['title'] = $this->viewData['mainMenuData']->title;
        $seo['description'] = array_get($this->viewData['mainMenuData'],'seo.meta_description');
        $seo['keywords'] = array_get($this->viewData['mainMenuData'],'seo.meta_keywords');

        $this->viewData['seo'] = $seo;
        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('manufacturing')->get();




        return response()
            ->view('web.manufacturing', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }


    public function research()
    {
        $this->viewData['thisMenu'] = 'research';
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

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('research')->get();



        return response()
            ->view('web.research', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
