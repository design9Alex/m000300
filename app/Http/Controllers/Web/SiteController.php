<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;

/**
 * Class SiteController
 */
class SiteController extends BaseController
{
    public function index()
    {
        $this->viewData['thisMenu'] = 'index';
        $this->viewData['mainMenuData'] = $mainMenuData = $this->getMainMenuData($this->viewData['thisMenu']);



        $seo = array();
        $seo['title'] = $this->viewData['mainMenuData']->title;
        $seo['description'] = array_get($this->viewData['mainMenuData'],'seo.meta_description');
        $seo['keywords'] = array_get($this->viewData['mainMenuData'],'seo.meta_keywords');

        $this->viewData['seo'] = $seo;

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('home')->get();

        return response()
            ->view('web.home', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
