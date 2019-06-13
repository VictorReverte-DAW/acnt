<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	  DB::table('rols')->insert([
            'nombre' => 'Presidente',
        ]);
    	   DB::table('rols')->insert([
            'nombre' => 'Vicepresidente',
        ]);
    	    DB::table('rols')->insert([
            'nombre' => 'Secretario',
        ]);
    	     DB::table('rols')->insert([
            'nombre' => 'Tesorero',
        ]);
    	      DB::table('rols')->insert([
            'nombre' => 'Portavoz',
        ]);
    	         DB::table('rols')->insert([
            'nombre' => 'Jugador',
        ]);
    }
}
