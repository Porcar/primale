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
          'worker_id' => 1,
          'name' => 'Cosplayer',
          'description' => 'Not much',
          'active' => True,
      ]);
      DB::table('tags')->insert([
          'worker_id' => 1,
          'name' => 'Superman',
          'description' => 'likes to fly',
          'active' => True,
      ]);
      DB::table('tags')->insert([
          'worker_id' => 1,
          'name' => 'Thor',
          'description' => 'Great Hammer',
          'active' => True,
      ]);    
    }
}
