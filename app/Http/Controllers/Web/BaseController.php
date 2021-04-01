<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Web\AdvertisingRepository;
use App\Repositories\Web\WebDataRepository;
use App\Repositories\Web\WebMenuRepository;
use App\Repositories\Web\SiteParameterItemRepository;
use App\Repositories\Web\ArticleColumnRepository;
use Minmax\Base\Web\Controller as Controller;

/**
 * Class BaseController
 */
class BaseController extends Controller
{
    protected $nowHost,$language_id,$languageUri;
    public function __construct(){
        parent::__construct();
        $BaseWebData = (new WebDataRepository)->getData();
        if(!$BaseWebData->active){
            $message = $BaseWebData->offline_text;
            echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>'.$message.'</title><link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"><style>html,body{background-color:#fff;color:#636b6f;font-family:\'Raleway\',sans-serif;font-weight:100;height:100vh;margin:0;}.full-height {height: 100vh;}.flex-center{align-items: center;display: flex;justify-content: center;}.position-ref {position: relative;}.content {text-align: center;}.title {font-size: 36px;padding: 20px;}</style></head><body><div class="flex-center position-ref full-height"><div class="content"><div class="title">'.$BaseWebData->offline_text.'</div></div></div></body></html>';
            exit;
        }

        //dd(backendPath('admin'),backendPath('administrator'));

        $this->nowHost = request()->getSchemeAndHttpHost();

        $this->viewData['nowPathInfo'] = request()->getPathInfo();

        $mainMenuIcon = array();
        $mainMenuIcon['about'] = '/styles/images/common/menu-icon-01.svg';
        $mainMenuIcon['manufacturings'] = '/styles/images/common/menu-icon-02.svg';
        $mainMenuIcon['manufacturing_2'] = '/styles/images/common/menu-icon-02-white.svg';
        $mainMenuIcon['cellregenerations'] = '/styles/images/common/menu-icon-03.svg';
        $mainMenuIcon['cellregeneration_2'] = '/styles/images/common/menu-icon-03-white.svg';
        $mainMenuIcon['contact'] = '/styles/images/common/menu-icon-04.svg';

        $this->viewData['mainMenuIcon'] = $mainMenuIcon;


        $footerMenuIcon = array();
        $footerMenuIcon['about'] = '/styles/images/common/menu-icon-01.svg';
        $footerMenuIcon['manufacturing'] = '/styles/images/common/menu-icon-02.svg';
        $footerMenuIcon['cellregeneration'] = '/styles/images/common/menu-icon-03.svg';
        $footerMenuIcon['contact'] = '/styles/images/common/menu-icon-04.svg';

        $this->viewData['footerMenuIcon'] = $footerMenuIcon;



        $this->viewData['mainMenu'] = $mainMenu = (new WebMenuRepository)->getMenu($this->checkUriOrID((new WebMenuRepository),'root-header'));
        //dd($mainMenu);

        $this->viewData['footerMenu'] = $footerMenu = (new WebMenuRepository)->getMenu($this->checkUriOrID((new WebMenuRepository),'root-footer'));

        $this->viewData['BaseWebData'] = $BaseWebData;

        $this->viewData['rootUri'] = ($BaseWebData->system_language == app()->getLocale() ? '' : (app()->getLocale() . '/'));
        $this->viewData['languageUri'] = ($this->viewData['rootUri'] == 'en/') ? '/'.substr(request()->getRequestUri(),4) : ((request()->getRequestUri() == "/")?'/en' : request()->getRequestUri());
        //dd(request()->getRequestUri(),$this->viewData['languageUri']);
        $this->viewData['d4Pic'] = "/styles/".$this->viewData['rootUri']."images/common/img-logo.jpg";

    }
    public function getMainMenuData($uri){
        return (new WebMenuRepository)->one('uri',$uri);
    }

    public function checkUriOrID($Repository,$value){
        $result = $Repository->one('uri', $value);
        $return = (isset($result))?$result->id:$value;
        return $return;
    }
    public function Tracks($modelData){
        try {
            $modelData->articleTracks()->create(['model' => get_class($modelData), 'object_id' => $modelData->getKey(), 'ip' => request()->ip(), 'click_at' => date('Y-m-d')]);
        } catch (\Exception $e) {
            //dd($e);
        }
    }
    public function getPageBanner($bannerId){
        return (new AdvertisingRepository)->getAdvertisingData($bannerId);
    }
    public function array_unique2($array){
        $return = [];
        foreach($array as $item){
            if(!in_array($item,$return)){
                $return[] = $item;
            }
        }
        return $return;
    }
    public function getResearchTable($CID){
        $columnList = (new ArticleColumnRepository)->getColumnsByCategory($CID,'id')->get();
        $columnArray = [];
        foreach($columnList as $item){
            $columnArray[$item->field][$item->technology][] = ['key' => ($item->uri)?$item->uri:$item->id,'title' => $item->title];
        }

        $fieldIdArray = $this->array_unique2($columnList->pluck('field')->toArray());
        $fieldList = (new SiteParameterItemRepository)->getItemsByCategory($fieldIdArray)->get();

        $technologyIdArray = $this->array_unique2($columnList->pluck('technology')->toArray());
        $technologyList = (new SiteParameterItemRepository)->getItemsByCategory($technologyIdArray)->get();

        return ['columnArray'=>$columnArray,'fieldList'=>$fieldList,'technologyList'=>$technologyList];
    }
    public function stdClassToSearch($object,$keyword) {
        $array = is_object($object) ? get_object_vars($object) : $object;
        foreach ($array as $key => $value) {
            $value = (is_array($value) || is_object($value)) ? $this->stdClassToSearch($value,$keyword) : $value;
            if(strpos(strtolower($value), strtolower($keyword)) !== false){
                return true;
            }
        }
        return false;
    }
}
