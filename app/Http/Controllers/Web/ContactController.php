<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;


use App\Http\Requests\Web\ContactRequest;
use Minmax\Article\Web\ArticlePageRepository;
use Minmax\Base\Helpers\Captcha;
use Illuminate\Http\Request;
use Minmax\Inbox\Models\InboxCategory;
use Minmax\Inbox\Models\InboxReceived;
use Session;
use Minmax\Base\Web\SiteParameterGroupRepository;
use Minmax\Base\Web\SiteParameterItemRepository;
use Minmax\Inbox\Admin\InboxCategoryRepository;
use Minmax\Inbox\Events\Received;
use Minmax\Inbox\Admin\InboxReceivedRepository;

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


    /**
     * @param  string $name
     * @param  integer $id
     * @return string
     */
    public function getCaptcha($name, $id = null)
    {
        $length=[
            'contact'=>6,
        ];
        $imageSetting=[
            'contact'=>['width' => 146, 'height' => 45,'fontSize'=>36],
        ];
        $colorSetting=[
            'contact'=>['font' => [75, 129, 191]],
        ];


        return Captcha::createCaptcha('web_captcha_' . $name, array_get($length,$name,4), $id, array_get($imageSetting,$name,['width' => 78, 'height' => 34,'fontSize'=>24]), array_get($colorSetting,$name,['font' => [224, 20, 14]]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitContactForm(InboxReceivedRepository $receivedRepository, ContactRequest $request){
        $attributes = $input = $request->input();

        $tSerial = self::recevedSerialNumberCreator();

        array_forget($attributes,['_token','captcha','hiddenRecaptcha']);

        $attributes['id'] = uuidl();
        $attributes['ip'] = $request->getClientIp();
        $attributes['inbox_status'] = 'new';
        $attributes['subject'] = array_get($attributes,'details.諮詢服務').'-'.array_get($attributes,'details.firstname').array_get($attributes,'details.lastname');
        $inboxCategory = InboxCategory::query()->where('active',true)->where('code','contact')->first()??abort(404);
        $attributes['category_id'] = $inboxCategory->id;
        $attributes['serial'] = array_get($tSerial,'receiveSerial');

        $contactModel = new InboxReceived();
        $contactModel->fill($attributes);
        $contactModel->save();

        //dd($contactModel->details);

        event(new Received($contactModel));


        return redirect(langRoute('web.contact-send'))->header('X-Frame-Options', 'DENY');
    }

    public function contactSend()
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


        return response()->view('web.contact-send', $this->viewData)->header('X-Frame-Options', 'DENY');
    }


    /**
     * @return array
     */
    public static function recevedSerialNumberCreator(){
        if ($serialData = \DB::table('inbox_serial')->where('date', date('Y-m-d'))->first()) {
            \DB::table('inbox_serial')->where('date', date('Y-m-d'))->increment('serial');
            $tSerial = $serialData->serial + 1;
        } else {
            \DB::table('inbox_serial')->insert(['date' => date('Y-m-d'), 'serial' => 1]);
            $tSerial = 1;
        }

        $tReturn = [
            'serial'            =>  $tSerial,
            'receiveSerial'     =>  'C' . date('Ymd') . str_pad($tSerial, 4, "0", STR_PAD_LEFT),
            'sentSerial'        =>  'R' . date('Ymd') . str_pad($tSerial, 4, "0", STR_PAD_LEFT),
        ];
        return $tReturn;
    }



    public function privacy()
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


        $this->viewData['articlePage'] = $articlePage = (new ArticlePageRepository)->getPagesByCategory('privacy')->first();
        if(!$articlePage){
            abort(404);
        }

        return response()
            ->view('web.privacy', $this->viewData)
            ->header('X-Frame-Options', 'DENY');
    }
}
