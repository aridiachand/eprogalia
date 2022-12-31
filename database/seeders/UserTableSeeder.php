<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = array(
            [
                'name' => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@aridiachand.com',
                'password' => bcrypt('admin'),
                'level' => 0,
                'management' => 1,
                'role_id' => 9
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2
            ]
        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
