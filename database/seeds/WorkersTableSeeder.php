<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('workers')->insert([
          'sex' => False,
          'age' => 20,
          'description' => "Super hot guy",
          'isworking' => True,
          'user_id' => 3,

      ]);

    }
}
