<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(LevelsTableSeeder::class);
       $this->call(MajorsTableSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(SubjectsTableSeeder::class);
   }
}
