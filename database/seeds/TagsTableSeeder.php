<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('tags')->insert([
          'name' => 'Cosplayer',
          'description' => 'Pikachu Cosplay',
          'sessions' => 3,
          'hours' => 2,
          'experience' => True,
      ]);
      DB::table('tags')->insert([
        'name' => 'Super Sado',
        'description' => '5000 shades of gray',
        'sessions' => 1,
        'hours' => 4,
        'sado' => True,
      ]);
      DB::table('tags')->insert([
        'name' => 'Normal sex',
        'description' => 'Abuelita Style',
        'hours' => 6,
        'normal' => True,
      ]);
      DB::table('tags')->insert([
        'name' => 'Mixed sex',
        'description' => 'Abuelita con burro Style',
        'hours' => 2,
        'normal' => True,
        'sado' => True,
      ]);
    }
}
