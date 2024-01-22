<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name ='david';
        $admin->email ='david@david.com';
        $admin->password=bcrypt('123456');
        // $admin->password='12345678';
        $admin->role='Manager';
        $admin->save();

        $admin2 = new User;
        $admin2->name ='claudia';
        $admin2->email ='claudia@claudia.com';
        $admin2->password=bcrypt('123456');
        // $admin2->password='12345678';
        $admin2->role='Manager';
        $admin2->save();

        $admin3 = new User;
        $admin3->name ='teresa';
        $admin3->email ='teresa@teresa.com';
        $admin3->password=bcrypt('123456');
        // $admin3->password='12345678';
        $admin3->role='Revisor';
        $admin3->save();

    }
}
