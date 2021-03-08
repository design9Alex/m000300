<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Minmax\Base\Helpers\Seeder as SeederHelper;
use Minmax\Base\Web\WebMenuRepository;

class WorldLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->updateWorldLanguage();
    }

    protected function updateWorldLanguage()
    {
        DB::table('world_language')->whereIn('code', ['ja', 'en'])->update([
            'active_admin' => true,
            'active' => true
        ]);

        DB::table('world_language')->whereIn('code', ['zh-Hant'])->update([
            'active_admin' => false,
            'active' => false
        ]);



    }
}
