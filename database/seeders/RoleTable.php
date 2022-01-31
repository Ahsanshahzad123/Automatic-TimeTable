<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Student']);
        $user = Role::create(['name' => 'User']);
    }
}
