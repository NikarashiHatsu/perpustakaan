<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Roles Information
         * EN // ID
         *  
         * 0 = Visitor // Pengunjung
         * 1 = Writer // Penulis
         * 2 = Admin // Admin
         * 3 = SuperUser // SuperUser
         */
        DB::table('users')->insert([[
            'name' => 'Aghits Nidallah',
            'access_code' => '161710040',
            'password' => Hash::make('161710040'),
            'reveal' => '161710040',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '2',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'Agus Niam Kholiq',
            'access_code' => '161710041',
            'password' => Hash::make('161710041'),
            'reveal' => '161710041',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '2',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'Alfian Teguh Arifianto',
            'access_code' => '161710042',
            'password' => Hash::make('161710042'),
            'reveal' => '161710042',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '2',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'Alif Nur Alamsyah',
            'access_code' => '161710043',
            'password' => Hash::make('161710043'),
            'reveal' => '161710043',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '2',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'Anggara Achmad Rajasa',
            'access_code' => '161710044',
            'password' => Hash::make('161710044'),
            'reveal' => '161710044',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '2',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'Admin',
            'access_code' => 'admin',
            'password' => Hash::make('admin'),
            'reveal' => NULL,
            'kelas' => NULL,
            'jurusan' => NULL,
            'rombel' => NULL,
            'role' => '2',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'NikarashiHatsu',
            'access_code' => 'nikarashihatsu',
            'password' => Hash::make('nikarashihatsu'),
            'reveal' => 'nikarashihatsu',
            'kelas' => NULL,
            'jurusan' => NULL,
            'rombel' => NULL,
            'role' => '1',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]]);
    }
}
