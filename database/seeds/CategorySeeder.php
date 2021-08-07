<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->insert([
      'ar_name' => 'ملابس',
      'en_name' => 'clothes',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
    DB::table('categories')->insert([
      'ar_name' => 'أحذية',
      'en_name' => 'shoes',
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
