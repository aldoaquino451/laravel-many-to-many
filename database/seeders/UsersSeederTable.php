<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'admin@admin';
        $user->password = '$2y$12$Ahb/YI0e03H3bckT0hQQtOzl/1UE0YghimZrMuR0OcFOW9Si8k1yS';

        $user->save();
    }
}
