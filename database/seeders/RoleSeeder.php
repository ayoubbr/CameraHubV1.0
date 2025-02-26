<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name' => 'admin', 
                'description' => 'Manager of the app'
            ]
        );

        Role::create(
            [
                'name' => 'client', 
                'description' => 'Visitor and buyer from the app'
            ]
        );

        $adminUser = \App\Models\User::find(1);
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }
    }
}
