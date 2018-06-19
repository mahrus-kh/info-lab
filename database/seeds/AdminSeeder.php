<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
           'name' => 'Mahrus Khomaini',
           'username' => 'mahruskh',
           'email' => 'mahrus.khomaini@gmail.com',
           'phone' => '089648399003',
           'address' => 'Malang',
           'password' => bcrypt(12345678)
        ]);
        Admin::create([
            'name' => 'Khomaini KH',
            'username' => 'khomainikh',
            'email' => 'khomaini.kh@gmail.com',
            'phone' => '089648399003',
            'address' => 'Malang',
            'password' => bcrypt(12345678)
        ]);
    }
}
