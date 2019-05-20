<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Mauricio Ernesto',
        	'email' => 'mauweb98@gmail.com',
        	'password' => bcrypt('12345678'),
        ]);
    }
}
