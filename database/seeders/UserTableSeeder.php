<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\App\Models\User::create([
			'name' => 'Jorge Eduardo Ardila',
			'email' => 'jea.data@gmail.com',
			'password' => bcrypt('password')	
		]); 
    }
}
