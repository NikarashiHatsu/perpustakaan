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
            'name' => 'siswaakl',
            'access_code' => 'siswaakl',
            'password' => Hash::make('siswaakl'),
            'reveal' => 'siswaakl',
            'kelas' => 'XII',
            'jurusan' => 'akuntansi_dan_keuangan_lembaga',
            'rombel' => '1',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'siswabdp',
            'access_code' => 'siswabdp',
            'password' => Hash::make('siswabdp'),
            'reveal' => 'siswabdp',
            'kelas' => 'XII',
            'jurusan' => 'bisnis_daring_pemasaran',
            'rombel' => '1',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'siswamm',
            'access_code' => 'siswamm',
            'password' => Hash::make('siswamm'),
            'reveal' => 'siswamm',
            'kelas' => 'XII',
            'jurusan' => 'multimedia',
            'rombel' => '1',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'siswaotkp',
            'access_code' => 'siswaotkp',
            'password' => Hash::make('siswaotkp'),
            'reveal' => 'siswaotkp',
            'kelas' => 'XII',
            'jurusan' => 'otomatisasi_dan_tata_kelola_perkantoran',
            'rombel' => '1',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'siswapkm',
            'access_code' => 'siswapkm',
            'password' => Hash::make('siswapkm'),
            'reveal' => 'siswapkm',
            'kelas' => 'XII',
            'jurusan' => 'perbankan_dan_keuangan_mikro',
            'rombel' => '1',
            'role' => '0',
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ], [
            'name' => 'siswaupw',
            'access_code' => 'siswaupw',
            'password' => Hash::make('siswaupw'),
            'reveal' => 'siswaupw',
            'kelas' => 'XII',
            'jurusan' => 'usaha_perjalanan_wisata',
            'rombel' => '1',
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
