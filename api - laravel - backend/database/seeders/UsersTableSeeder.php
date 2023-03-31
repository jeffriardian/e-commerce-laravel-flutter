<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = "Administrator";
        $user->email = "jeffriardian.kuningan@gmail.com";
        $user->password = bcrypt('secret');
        $user->is_admin = true;
        $user->save();
    }
}
