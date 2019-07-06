<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [
                'name' => 'Yanto Lie',
                'email' => 'yantolie@gmail.com',
                'address' => 'Jl. Gejayan No. 20, Yogyakarta',
                'phone_number' => '087838907726',
                'password' => bcrypt('secret'),
                'role_id' => 2,
            ],
            [
                'name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'address' => 'Jl. Godean No. 2, Yogyakarta',
                'phone_number' => '087838907710',
                'password' => bcrypt('secret'),
                'role_id' => 1,
            ],
            [
                'name' => 'Atta Gledek',
                'email' => 'atta@gmail.com',
                'address' => 'Jl. Bojong No. 20, Bojonegoro',
                'phone_number' => '087838907730',
                'password' => bcrypt('secret'),
                'role_id' => 3,
            ]
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
