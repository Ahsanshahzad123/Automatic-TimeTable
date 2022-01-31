<?php

namespace Database\Seeders;

use Database\Seeders\RoleTable;
use Database\Seeders\UserTable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleTable::class,
        ]);
        $this->call([
            UserTable::class,
        ]);
    }
}
