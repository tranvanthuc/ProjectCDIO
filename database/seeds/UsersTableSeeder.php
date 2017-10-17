<?php

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
        $users = [
        	['username' => 'tranvanthuc' , 'password' => bcrypt('thuc1234') , 'name' => 'thuc', 'email' => 'thuc@gmail.com', 'phone' => '01285136039', 'address' => '123TT' , 'level_id' => 3 , 'major_id' => 2 ],

        	['username' => 'thuc365' , 'password' => bcrypt('thuc1234') , 'name' => 'hung', 'email' => 'hung@gmail.com', 'phone' => '0993213922', 'address' => '123ASD', 'level_id' => 3 , 'major_id' => 3],

        	
        ];

        $managers = [
            ['username' => 'super' , 'password' => bcrypt('thuc1234') , 'name'=> 'super' ,'level_id' => 0 ],
            ['username' => 'admin' , 'password' => bcrypt('thuc1234') , 'name'=> 'admin' ,'level_id' => 1 ],
            ['username' => 'thuc' , 'password' => bcrypt('thuc1234') , 'name'=> 'thuc' ,'level_id' => 2 ],
           
        ];
        DB::table('users')->insert($managers);
        DB::table('users')->insert($users);
        
    }
}
