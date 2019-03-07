<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([[
            'category_id' => '1',
            'subcategory_name' => 'Kelas 10',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '1',
            'subcategory_name' => 'Kelas 11',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '1',
            'subcategory_name' => 'Kelas 12',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'akuntansi_dan_keuangan_lembaga',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'bisnis_daring_pemasaran',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'multimedia',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'otomatisasi_tata_kelola_perkantoran',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'perbankan_dan_keuangan_mikro',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'category_id' => '2',
            'subcategory_name' => 'usaha_perjalanan_wisata',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]]);
    }
}
