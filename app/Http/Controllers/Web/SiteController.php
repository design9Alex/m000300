<?php

namespace App\Http\Controllers\Web;

use Minmax\Base\Web\Controller as BaseController;

/**
 * Class SiteController
 */
class SiteController extends BaseController
{
    public function index()
    {
        return response()
            ->view('web.home', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
