<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Admin',
          'lastname' => 'Admin',
          'email' => 'admin@primale.com',
          'username' => 'admin',
          'credential' => '01',
          'phone' => 'admin',
    'address' => 'Admin address',
          'password' => bcrypt('1234'),
          'image' => 'img/avatar.png',
          'active' => True,
          'role_id' => 1,
      ]);
      DB::table('users')->insert([
          'name' => 'Provider',
          'lastname' => 'Provider',
          'email' => 'provider@primale.com',
          'username' => 'provider',
          'credential' => '02',
          'phone' => 'provider',
    'address' => 'provider address',
          'password' => bcrypt('1234'),
          'image' => 'img/avatar.png',
          'active' => True,
          'role_id' => 2,
      ]);
      DB::table('users')->insert([
          'name' => 'Worker',
          'lastname' => 'Worker',
          'email' => 'Worker@primale.com',
          'username' => 'Worker',
          'credential' => '03',
          'phone' => 'Worker',
    'address' => 'Worker address',
          'password' => bcrypt('1234'),
          'image' => 'img/avatar.png',
          'active' => True,
          'role_id' => 3,
      ]);
      DB::table('users')->insert([
          'name' => 'Client',
          'lastname' => 'Client',
          'email' => 'Client@primale.com',
          'username' => 'Client',
          'credential' => '04',
          'phone' => 'Client',
    'address' => 'Client address',
          'password' => bcrypt('1234'),
          'image' => 'img/avatar.png',
          'active' => True,
          'role_id' => 4,
      ]);
    }
}
