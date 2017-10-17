<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
			['name' => 'Toán Cao Cấp A1'],
    		['name' => 'Toán Cao Cấp A2'],
            ['name' => 'Toán rời rạc'],
            ['name' => 'KTin đại cương'],
            ['name' => 'Tin ứng dụng'],
            ['name' => 'Nói và Viết Tiếng Việt'],
            ['name' => 'Đồ Án CDIO 1'],
    		['name' => 'C#'],
    		['name' => 'C'],
    		['name' => 'C++'],
    		['name' => 'Java'],
            ['name' => 'ASP.NET'],
            ['name' => 'Hệ Quản Trị Cơ Sở Dữ Liệu'],
            ['name' => 'Lý Thuyết Mạch'],
            ['name' => 'Văn Học Dân Gian Việt Nam'],
            ['name' => 'Thể Chế Chính Trị Thế Giới'],
            ['name' => 'Đồ Án CDIO 2'],
            ['name' => 'Lý Thuyết Dịch Anh Văn'],
            ['name' => 'Căn Bản Vi Sinh Học'],
            ['name' => 'Sinh Học Phân Tử'],
            ['name' => 'Hệ Thống Thông Tin Địa Lý (GIS)'],
            ['name' => 'Thuế Nhà Nước'],
            ['name' => 'Sức Khỏe Môi Trường'],
            ['name' => 'Hóa Lý Căn Bản'],
            ['name' => 'Kỹ Thuật Số'],
            ['name' => 'Dược Học Cổ Truyền'],
    		['name' => 'Kết Cấu Nhà Thép'],
    	];
        DB::table('subjects')->insert($subjects);
    }
}
