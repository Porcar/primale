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
      ]);
      DB::table('tags')->insert([
          'name' => 'Superman',
      ]);
      DB::table('tags')->insert([
          'name' => 'Thor',
      ]);
    }
}
