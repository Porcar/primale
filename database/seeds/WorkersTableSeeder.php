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
          'price' => 10,
          'isworking' => True,
          'start_date' => '2005-09-23',
          'end_date' => '2015-09-23',
          'user_id' => 3,
          'provider_id' => 1,

      ]);
    }
}
