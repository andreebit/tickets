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
        $user = [
            'name' => 'Andreé Sandoval',
            'email' => 'andree.bit@gmail.com',
            'password' => \Hash::make('123456'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        DB::table('users')->delete();
        DB::table('users')->insert($user);
    }
}
