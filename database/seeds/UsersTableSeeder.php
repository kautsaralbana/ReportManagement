<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'departement_id' => 2,
            'name' => 'Galih',
            'email' => 'galih@user.com',
            'password' => bcrypt('password')
        ]);
        $role = Role::create(['name' => 'User']);        
        $user->assignRole([$role->id]);
    }
}
