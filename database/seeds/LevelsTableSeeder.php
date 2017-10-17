<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$levels = [
    		['id' => 0, 'name'=> 'Super Admin'],
    		['id' => 1, 'name'=> 'Admin'],
    		['id' => 2, 'name'=> 'Censor'],
    		['id' => 3, 'name'=> 'Member VIP'],
    		['id' => 4, 'name'=> 'Member Normal']
    	];
        DB::table('levels')->insert($levels);
    }
}
