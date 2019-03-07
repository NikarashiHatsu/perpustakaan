<?php

use Illuminate\Database\Seeder;

class IndicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indices')->insert([[
            'setting_for' => 'index',
            'fa_icon' => 'fa-book',
            'content' => '"Dalam arti tradisional, perpustakaan adalah sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, serta dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku dengan biaya sendiri."<br />-Wikipedia<br /><br />Digital Library atau perpustakaan digital adalah suatu perpustakaan yang menyimpan data baik itu buku (tulisan), gambar, suara dalam bentuk file elektronik dan mendistribusikannya dengan menggunakan protocol elektronik melalui jaringan komputer.'
        ], [
            'setting_for' => 'daftar_buku',
            'fa_icon' => 'fa-book',
            'content' => '"Buku adalah kumpulan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan atau gambar. Setiap sisi dari sebuah lembaran kertas pada buku disebut sebuah halaman. Seiring dengan perkembangan dalam bidang dunia informatika, kini dikenal pula istilah e-book atau buku-e (buku elektronik), yang mengandalkan perangkat seperti komputer meja, komputer jinjing, komputer tablet, telepon seluler dan lainnya, serta menggunakan perangkat lunak tertentu untuk membacanya."<br />-Wikipedia'
        ], [
            'setting_for' => 'daftar_penulis',
            'fa_icon' => 'fa-user',
            'content' => '"Penulis adalah sebutan bagi orang yang melakukan pekerjaan menulis, atau menciptakan suatu karya tulis. Menulis adalah kegiatan membuat huruf (angka) menggunakan alat tulis di suatu sarana atau media penulisan, mengungkapkan ide, pikiran, perasaan melalui kegiatan menulis, atau menciptakan suatu karangan dalam bentuk tulisan."<br />-Wikipedia'
        ]]);
    }
}
