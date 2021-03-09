<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;

class SiteParameterContact extends Seeder
{
    protected $timestamp,$languageList,$languageResourceData;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->timestamp = date('Y-m-d H:i:s');
        $this->languageList = SeederHelper::getLanguageIdList();
        $this->languageResourceData = [];


        $this->insertOrderReturnSubject();
        $this->insertLanguageResource();
    }

    protected function insertOrderReturnSubject()
    {
        //建立siteParameterGroup
        $startExtensionId = SeederHelper::getTableNextIncrement('site_parameter_group');
        $siteParameterGroupData = [
            ['code' => 'service-item', 'title' => '諮詢服務', 'category' => null, 'editable' => true],
            ['code' => 'participation', 'title' => '參加類別', 'category' => null, 'editable' => true],
            ['code' => 'country', 'title' => '國家', 'category' => null, 'editable' => true],
            ['code' => 'contact-item', 'title' => '項目', 'category' => null, 'editable' => true],
        ];
        SeederHelper::setLanguageExchange($siteParameterGroupData, $this->languageResourceData, 'site_parameter_group', 'title', $this->languageList, $startExtensionId);
        DB::table('site_parameter_group')->insert($siteParameterGroupData);

        //取得siteParameterGroup Id by code
        $orderReturnSubjectGroupId = DB::table('site_parameter_group')->where('code', 'service-item')->value('id');
        $orderReturnSubjectGroupId2 = DB::table('site_parameter_group')->where('code', 'participation')->value('id');
        $orderReturnSubjectGroupId3 = DB::table('site_parameter_group')->where('code', 'country')->value('id');
        $orderReturnSubjectGroupId4 = DB::table('site_parameter_group')->where('code', 'contact-item')->value('id');

        //建立siteParameterItems
        $startSPItemId = SeederHelper::getTableNextIncrement('site_parameter_item');
        $siteParameterItemData = [
            ['group_id' => $orderReturnSubjectGroupId, 'label' => '製造ファウンドリサービス', 'value' => '1', 'sort' => 1, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId, 'label' => '代理相談', 'value' => '2', 'sort' => 2, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId, 'label' => '製品に関するお問い合わせ', 'value' => '3', 'sort' => 3, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId, 'label' => '臨床試験の開発', 'value' => '4', 'sort' => 4, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId, 'label' => 'その他', 'value' => '5', 'sort' => 5, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],

            ['group_id' => $orderReturnSubjectGroupId2, 'label' => '医師（M.D./Ph.D）', 'value' => '1', 'sort' => 1, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId2, 'label' => '企業', 'value' => '2', 'sort' => 2, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId2, 'label' => '一般の方', 'value' => '3', 'sort' => 3, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],


            ['group_id' => $orderReturnSubjectGroupId3, 'label' => 'Afghanistan', 'value' => 'AF', 'sort' => 1, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId3, 'label' => 'Albania', 'value' => 'AL', 'sort' => 2, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId3, 'label' => 'Taiwan', 'value' => 'TW', 'sort' => 3, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],

            ['group_id' => $orderReturnSubjectGroupId4, 'label' => '製造ファウンドリサービス', 'value' => '1', 'sort' => 1, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId4, 'label' => '代理相談', 'value' => '2', 'sort' => 2, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId4, 'label' => '製品に関するお問い合わせ', 'value' => '3', 'sort' => 3, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId4, 'label' => '臨床試験の開発', 'value' => '4', 'sort' => 4, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],
            ['group_id' => $orderReturnSubjectGroupId4, 'label' => 'その他', 'value' => '5', 'sort' => 5, 'details' => null, 'options' => null, 'active' => true, 'editable' => true],


        ];
        SeederHelper::setLanguageExchange($siteParameterItemData, $this->languageResourceData, 'site_parameter_item', ['label','details'], $this->languageList, $startSPItemId);
        DB::table('site_parameter_item')->insert($siteParameterItemData);
    }

    protected function insertLanguageResource(){
        DB::table('language_resource')->insert($this->languageResourceData);
    }

}
