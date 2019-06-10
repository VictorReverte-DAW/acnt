<?php

use Illuminate\Database\Seeder;

class MiembroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_Secretario = Role::where('name','Tesorero')->first();

        $user = new Miembro();
        $user->roles()->attach($role_Secretario);
    }
}
