<?php

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    // $faker = Faker::create('App\Article');
    // DB::table('articles')->insert([
    //     'title' => $faker->sentence(),
    //     'description' => $faker->sentence(),
    //     'body' => $faker->paragraph(),
    //     'created_at' => \Carbon\Carbon::now(),
    //     'Updated_at' => \Carbon\Carbon::now(),
    // ]);
    {
        $faker = Faker::create('App\Models\Admin');
        DB::table('admins')->insert([
            'name'      =>  $faker->name,
            'email'     =>  $faker->email,
            'password'  =>  bcrypt('password'),
        ]);    
    }
}
// for inserting 10 columns of user
// $faker = Faker::create();
//     	foreach (range(1,10) as $index) {
// 	        DB::table('users')->insert([
// 	            'name' => $faker->name,
// 	            'email' => $faker->email,
// 	            'password' => bcrypt('secret'),
// 	        ]);
// 	}
