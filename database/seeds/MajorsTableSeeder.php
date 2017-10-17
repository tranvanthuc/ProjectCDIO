<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            ['name' => 'Kỹ thuật mạng'],
            ['name' => 'Công nghệ Phần mềm'],
            ['name' => 'Thiết kế đồ họa/Game/Multimedia'],
            ['name' => 'Hệ thống thông tin quản lý'],
            ['name' => 'Xây Dựng Dân dụng & Công Nghiệp'],
            ['name' => 'Xây dựng Cầu Đường'],
            ['name' => 'Công NGhệ quản lý Xây Dựng'],
            ['name' => 'Kiến trúc công trình'],
            ['name' => 'Thiết kế nội thất'],
            ['name' => 'Điện tự động'],
            ['name' => 'Thiết kế số'],
            ['name' => 'Điện tử - Viễn thông'],
            ['name' => 'Công nghệ & kỹ thuật mội trường'],
            ['name' => 'Công nghệ & quản lý môi trường'],
            ['name' => 'Công Nghệ Thực phẩm'],
            ['name' => 'Quản trị Marketing'],
            ['name' => 'Quản trị Kinh doanh Tổng hợp'],
            ['name' => 'Ngoại Thương'],
            ['name' => 'Quản trị Du lịch Khách sạn'],
            ['name' => 'Quản trị Du lịch Lữ Hành'],
            ['name' => 'Kinh Doanh Ngoại Thương'],
            ['name' => 'Tài chính doanh nghiệp'],
            ['name' => 'Ngân Hàng'],
            ['name' => 'Kế toán Kiểm Toán'],
            ['name' => 'Kế toán Doanh Nghiệp'],
            ['name' => 'Tiếng anh Biên-Phiên dịch'],
            ['name' => 'Tiếng Anh Du lịch'],
            ['name' => 'Văn - Báo Chí'],
            ['name' => 'Quan hệ quốc tế'],
    		
    	];
        DB::table('majors')->insert($majors);
    }
}
