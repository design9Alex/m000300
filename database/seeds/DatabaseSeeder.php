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

        $this->call(RolePermissionsSeeder::class);
    }
}
