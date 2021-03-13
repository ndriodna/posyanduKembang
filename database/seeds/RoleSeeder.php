<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
             'role' => 'super',
       ]);

       DB::table('roles')->insert([
             'role' => 'admin',
       ]);

       DB::table('roles')->insert([
             'role' => 'user',
       ]);
    }
}
