<?php

use Illuminate\Database\Seeder;

class InpiratesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspirates')->insert([[
            'inpire' => ''
        ]]);
    }
}
