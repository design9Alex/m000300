<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;
use Minmax\Base\Web\WebMenuRepository;

class WebDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->updateWebData();
    }

    protected function updateWebData()
    {
        $webData = DB::table('web_data')->get();
        $admin = $webData->where('guard','admin')->first();
        $web = $webData->where('guard','web')->first();

        $updateAdmin = [
            'system_email'=>'info@dag-regen.com',
            'system_mobile'=>'+65 84780262',
            'system_logo'=>json_encode([['path'=>"/styles/images/logo.svg"]]),
            'social'=>json_encode([[
                'facebook'=>"",
                'youtube'=>"",
                'instagram'=>"",
            ]]),
        ];
        \DB::table('web_data')->where(['id'=>$admin->id])->update($updateAdmin);


        $updateWeb = [
            'system_email'=>'info@dag-regen.com',
            'system_mobile'=>'+65 84780262',
            'system_logo'=>json_encode([['path'=>"/styles/images/logo.svg"]]),
            'social'=>json_encode([[
                'facebook'=>"",
                'youtube'=>"",
                'instagram'=>"",
            ]]),
        ];
        \DB::table('web_data')->where(['id'=>$web->id])->update($updateWeb);


        \DB::table('language_resource')->where(['key'=>$web->website_name,'language_id'=>'1'])->update(['text'=>'喬翡利亞醫藥有限公司']);
        //\DB::table('language_resource')->where(['key'=>$web->website_name,'language_id'=>'2'])->update(['text'=>'DAG Regenerative Engineering Pte Ltd.']);
        \DB::table('language_resource')->where(['key'=>$web->website_name,'language_id'=>'3'])->update(['text'=>'DAG Regenerative Engineering Pte Ltd.']);
        \DB::table('language_resource')->where(['key'=>$web->website_name,'language_id'=>'4'])->update(['text'=>'DAG Regenerative Engineering Pte Ltd.']);

        \DB::table('language_resource')->where(['key'=>$web->company,'language_id'=>'1'])->update(['text'=>json_encode(['name'=>'喬翡利亞醫藥有限公司']),]);
        //\DB::table('language_resource')->where(['key'=>$web->company,'language_id'=>'2'])->update(['text'=>json_encode(['name'=>'DAG Regenerative Engineering Pte Ltd.']),]);
        \DB::table('language_resource')->where(['key'=>$web->company,'language_id'=>'3'])->update(['text'=>json_encode(['name'=>'DAG Regenerative Engineering Pte Ltd.']),]);
        \DB::table('language_resource')->where(['key'=>$web->company,'language_id'=>'4'])->update(['text'=>json_encode(['name'=>'DAG Regenerative Engineering Pte Ltd.']),]);

        \DB::table('language_resource')->where(['key'=>$web->contact,'language_id'=>'1'])->update(['text'=>json_encode(['phone'=>'+65 84780262','email'=>'info@dag-regen.com','address'=>'Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732', 'map' => 'https://goo.gl/maps/kqHXiGS2yonspLEc6'])]);
        //\DB::table('language_resource')->where(['key'=>$web->contact,'language_id'=>'2'])->update(['text'=>json_encode(['phone'=>'+65 84780262','email'=>'info@dag-regen.com','address'=>'Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732', 'map' => 'https://goo.gl/maps/kqHXiGS2yonspLEc6'])]);
        \DB::table('language_resource')->where(['key'=>$web->contact,'language_id'=>'3'])->update(['text'=>json_encode(['phone'=>'+65 84780262','email'=>'info@dag-regen.com','address'=>'Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732', 'map' => 'https://goo.gl/maps/kqHXiGS2yonspLEc6'])]);
        \DB::table('language_resource')->where(['key'=>$web->contact,'language_id'=>'4'])->update(['text'=>json_encode(['phone'=>'+65 84780262','email'=>'info@dag-regen.com','address'=>'Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732', 'map' => 'https://goo.gl/maps/kqHXiGS2yonspLEc6'])]);




        /*
        \DB::table('language_resource')->where(['key'=>$web->options,'language_id'=>'1'])->update(['text'=>json_encode([
            'body'=>'<script>
                    window.fbAsyncInit = function() {
                    FB.init({
                      appId      : \'810381972873536\',
                      cookie     : true,
                      xfbml      : true,
                      version    : \'v9.0\'
                    });

                    FB.AppEvents.logPageView();

                    };

                    (function(d, s, id){
                     var js, fjs = d.getElementsByTagName(s)[0];
                     if (d.getElementById(id)) {return;}
                     js = d.createElement(s); js.id = id;
                     js.src = "https://connect.facebook.net/en_US/sdk.js";
                     fjs.parentNode.insertBefore(js, fjs);
                    }(document, \'script\', \'facebook-jssdk\'));
                </script>',
        ]),
        ]);
        */
    }
}
