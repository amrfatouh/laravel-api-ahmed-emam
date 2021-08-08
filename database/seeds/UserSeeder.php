<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'Mr Wanderer',
      'email' => 'mr.wanderer14@gmail.com',
      'password' => bcrypt('12345678'),
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
