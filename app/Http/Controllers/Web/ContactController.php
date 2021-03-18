<?php

namespace App\Http\Controllers\Web;
use App\Repositories\Web\ArticleElementRepository;


use App\Http\Requests\Web\ContactRequest;
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

        array_forget($attributes,['_token','captcha']);

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



    /**
     * 發信
     * @param $toMail
     * @param $toMailName
     * @param $fromMail
     * @param $fromName
     * @param $body
     * @param $Subject
     * @return bool
     * @throws phpmailerException
     */
    public static function sendEmail($toMail , $toMailName , $fromMail , $fromName , $body , $Subject){

        $webData = httpFunction::webData('tw');


        $sql = 'select * from smtp_data where guid=? ';
        $smtpData = DB::select($sql,array('1'));


        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = "utf-8";
            $mail->Encoding = "base64";
            $mail->IsSMTP(); //使用SMTP寄信

            if($smtpData[0]->smtp_auth == 'N')
            {
                $mail->SMTPAuth = false;
                //$mail->SMTPSecure = "tls"; //一定要用ssl
            }else{
                $mail->SMTPAuth = true;
                //$mail->SMTPSecure = "tls"; //一定要用ssl
                //$mail->SMTPSecure = "ssl"; //一定要用ssl
                $mail->Username = $smtpData[0]->username; //gmail帳號
                $mail->Password = $smtpData[0]->password; //gmail密碼
            }


            $mail->Host = $smtpData[0]->host; // SMTP server
            $mail->Port = $smtpData[0]->port;
            $mail->From = $smtpData[0]->form_email;
            $mail->FromName = $fromName;
            $mail->Subject = $Subject;
            //注意：這裡要用明文設定Gmail的帳號密碼，所以有可能被他人盜用
            //如果你是用虛擬主機的不建議使用(或申請另一個Gmail)

            //IsHTML設為true才能用HTML格式化文件
            $mail->IsHTML(true);
            $mail->Body = $body;


            $toMailArr = explode(",",$toMail);
            for($ii=0;$ii<count($toMailArr);$ii++){
                if(!empty($toMailArr)){
                    $mail->AddAddress($toMailArr[$ii], $toMailName);
                }
            }

            //判斷寄信是否成功
            /*
			if (!$mail->Send()) {
                return false;
			} else {
				return true;
			}
            */
            $mail->send();
        }catch(phpmailerException $e){
            dd($e);
        }catch(Exception $e){
            dd($e);
        }
    }
}
