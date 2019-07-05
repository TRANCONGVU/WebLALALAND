<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $roles = "Cộng tác viên, Quản trị viên, Administrator";
        $role = explode(',',$roles);
        foreach($role as $rl)
        {
            DB::table('role')->insert([
                'name' => $rl
            ]);
        }

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password :12345678
            'level' => 3,
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
    }
}
