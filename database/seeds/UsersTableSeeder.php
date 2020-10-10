<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$Qu3Zpax1iR55N9ovCOJZjuGkNYxPm6xFqGwLT8MQ1IrBqRbSW/lVO',
            'remember_token' => null,
            'created_at'     => '2019-08-11 00:44:45',
            'updated_at'     => '2019-08-11 00:44:45',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
