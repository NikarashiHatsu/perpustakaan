<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'category_name' => 'kelas',
            'color_scheme' => 'red',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_name' => 'jurusan',
            'color_scheme' => 'orange',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_name' => 'mata_pelajaran',
            'color_scheme' => 'yellow',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]]);
    }
}
