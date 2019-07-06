<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function slug($str){

        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $str = preg_replace('/ - /', ' ', $str);
        $exp = explode(' ',$str);
        $kq='';
        foreach($exp as $val){
            $kq .= $val.'-';
        }
        $kq .= time().'.html';
        return $kq;
    }

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
     /*   $roles = "Cộng tác viên, Quản trị viên, Administrator";
        $role = explode(',',$roles);
        foreach($role as $rl)
        {
            DB::table('role')->insert([
                'name' => $rl
            ]);
        }*/

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'status' => '1',
            'password' => bcrypt('12345678'), // password :12345678
            //'level' => 3,
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'birth' => '1997-5-12',
            'avatar' => 'male.png',
            'gender' => '0',
            'email' => 'user@gmail.com',
            'status' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password :12345678

        ]);

        $cate_news = "Tin Khuyến Mãi,Tin Thời Trang,Sự Kiện";
        $cates = explode(',',$cate_news);
        foreach($cates as $cate)
        {
            DB::table('cate_news')->insert([
                'name' => $cate,
                'slug' => $this->slug($cate)
            ]);
        }
    }
}
