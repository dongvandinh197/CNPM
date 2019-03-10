<?php

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
        $users =[
        	[
                'name' => 'Tran Thi Dieu Ninh',
                'email' => 'ninhdieuthitran@gmail.com',
                'password' => Hash::make(123456),
                'remember_token' => str_random(10),
                'role' => 20
        ],
        [
            'name' => 'Dinh Van Dong',
            'email' => 'masterytop197@gmail.com',
            'password' => Hash::make(123456),
            'remember_token' => str_random(10),
            'role' => 50
        ]
    ];
        DB::table('users')->insert($users);
    }
}
