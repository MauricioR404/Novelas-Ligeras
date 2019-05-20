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
        $this->call(UsersTableSeeder::class);
        $this->call(CapitulosTableSeeder::class);
        $this->call(NovelasTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
