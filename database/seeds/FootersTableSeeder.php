<?php

use Illuminate\Database\Seeder;

class FootersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([[
            'link_for' => 'facebook',
            'value' => 'nikarashi.hatsu',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'link_for' => 'twitter',
            'value' => 'nikarashihatsu',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'link_for' => 'instagram',
            'value' => 'nikarashihatsu',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]]);
    }
}
