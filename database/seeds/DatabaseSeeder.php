<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(WorldLanguageSeeder::class);
        $this->call(SampleSeeder::class);
        $this->call(WebDataSeeder::class);

        $this->call(ArticleElementSeeder::class);
        $this->call(ArticleElementAboutSeeder::class);
        $this->call(AdvertisingAboutSeeder::class);

        $this->call(ArticleElementManufacturingSeeder::class);
        $this->call(AdvertisingManufacturingSeeder::class);

        $this->call(RolePermissionsSeeder::class);
    }
}
