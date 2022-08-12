<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat Role
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin', // optional
        ]);

        $customerRole = Role::create([
            'name' => 'member',
            'display_name' => 'Customer', // optional

        ]);

        // membuat sample user
        $adminUser = new User();
        $adminUser->name = 'Admin';
        $adminUser->email = 'admin@gmail.com'; // optional
        $adminUser->password = bcrypt('rahasia');
        $adminUser->save();
        $adminUser->attachRole($adminRole);

        $customerUser = new User();
        $customerUser->name = 'Customer';
        $customerUser->email = 'customer@gmail.com'; // optional
        $customerUser->password = bcrypt('rahasia');
        $customerUser->save();
        $customerUser->attachRole($customerRole);

    }
}