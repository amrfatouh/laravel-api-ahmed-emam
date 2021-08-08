<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('admins')->insert([
      'name' => 'Amr Fatouh',
      'email' => 'amrfatouh1499@gmail.com',
      'password' => bcrypt('12345678'),
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
