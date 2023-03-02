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
                'role_id' => 9,
                'id_branch' => 1,
                'id_department' => 1
            ],
            [
                'name' => 'User Pondok Bambu',
                'username' => 'userpb',
                'email' => 'userpb@aridiachand.com',
                'password' => bcrypt('userpb'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'User Depok',
                'username' => 'userdpk',
                'email' => 'userdpk@aridiachand.com',
                'password' => bcrypt('userdpk'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],
            [
                'name' => 'Taufik',
                'username' => 'user1',
                'email' => 'user1@aridiachand.com',
                'password' => bcrypt('user1'),
                'level' => 1,
                'management' => 2,
                'id_branch' => 3,
                'id_department' => 1
            ],

        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
