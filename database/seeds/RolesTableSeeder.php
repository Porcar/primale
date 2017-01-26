<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
          'name' => 'Admin',
          'description' => 'General System Manager',
      ]);
      DB::table('roles')->insert([
          'name' => 'Provider',
          'description' => 'General Sex Worker Manager',
      ]);
      DB::table('roles')->insert([
          'name' => 'Worker',
          'description' => 'General Sex Worker',
      ]);
      DB::table('roles')->insert([
          'name' => 'Client',
          'description' => 'General Client',
      ]);
    
    }
}
