<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $roles = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'Owner'
            ],
            [
                'name' => 'User'
            ]
        ];
        foreach ($roles as $value) {
            Role::create($value);
        }
    }
}
