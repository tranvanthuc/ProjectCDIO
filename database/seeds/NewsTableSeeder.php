<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
        	['title' => 'Sach Toan Roi rac Thay Dung' , 'slug' => str_slug('Sach Toan Roi rac')  , 'subject' => 'Toan roi rac', 'desc' => 'asdasdsa', 'price' => '1000',  'image' => '...' , 'status' => 1, 'user_id' => 3 , 'major_id' => 2 ],

        	['title' => 'Mi Thuat Thay Dinh Hung' , 'slug' => str_slug('Mi Thuat Thay Dinh Hung') , 'subject' => 'Mi Thuat', 'desc' => 'asdsad', 'price' => '2000',  'image' => '...' , 'status' => 1, 'user_id' => 2 , 'major_id' => 3 ],

        	['title' => 'CDIO Thay Man' , 'slug' => str_slug('CDIO Thay Man')  , 'subject' => 'CDIO', 'desc' => 'asdasd', 'price' => '2000',  'image' => '...' , 'status' => 0, 'user_id' => 1 , 'major_id' => 1 ],

        	

        	

        ];
        DB::table('news')->insert($news);
    }
}
