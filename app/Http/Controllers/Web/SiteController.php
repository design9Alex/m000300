<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\AdvertisingRepository;
use App\Repositories\Web\ArticleElementRepository;
use Minmax\Base\Models\WebData;

/**
 * Class SiteController
 */
class SiteController extends BaseController
{
    public function index()
    {
        $this->viewData['thisMenu'] = 'index';
        $this->viewData['mainMenuData'] = $mainMenuData = $this->getMainMenuData($this->viewData['thisMenu']);

        $this->viewData['bannerData'] = $bannerData = (new AdvertisingRepository())->getAdvertising('home_banner');

        $seo = array();
        $seo['title'] = $this->viewData['webData']['website_name'];
        $seo['description'] = $this->viewData['webData']['seo']['meta_description'];
        $seo['keywords'] = $this->viewData['webData']['seo']['meta_keywords'];

        $this->viewData['seo'] = $seo;

        $this->viewData['articleElements'] = $articleElements = (new ArticleElementRepository)->getElementByCategory('home')->get();

        return response()
            ->view('web.home', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
