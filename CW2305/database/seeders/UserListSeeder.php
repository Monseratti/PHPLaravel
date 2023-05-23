<?php

namespace Database\Seeders;

use App\Models\UserList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserList::factory()->count(100)->create();
    }
}
