<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Wildansyah',
            'email'     => 'wildansyah@gmail.com',
            'ttl'       => 'Bandung 25 Januari 2001',
            'unit_kerja'=> 'Guru Besar',
            'role'      => 'super_admin',
            'status'    => '',
            'NIP'       => '12819281',
            'gambar'    => '1602739314_profile.jpg',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name'      => 'Husein',
            'email'     => 'husein@gmail.com',
            'ttl'       => 'Bandung 10 Maret 2000',
            'unit_kerja'=> 'Dosen',
            'role'      => 'mini_admin',
            'status'    => 'TeknologiPendidikan',
            'NIP'       => '192129102',
            'gambar'    => '1604707361_talha.jpg',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name'      => 'Sandika',
            'email'     => 'sandika@gmail.com',
            'ttl'       => 'Bandung 09 Desember 2002',
            'unit_kerja'=> 'Rektor',
            'role'      => 'admin_pegawai',
            'status'    => '',
            'NIP'       => '128819281',
            'gambar'    => '1603677674_user-01.jpg',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('data_barang')->insert([
            'nama_prodi'    => 'NULL',
            'kode_barang'   => '12910291',
            'nama_barang'   => 'AC',
            'jenis_barang'  => 'ELEKTRONIK',
            'lokasi'        => 'Bandung',
            'jumlah_barang' => '10',
            'sumber_dana'   => 'BPPTnbh',
            'harga_barang'  => '150000000',
            'kondisi'       => 'Baik',
            'thn_peroleh'   => '2020',
            'gambar'        => '1604273854_chadengle.jpg',
            'keterangan'    => 'kondisi barang baik'
        ]);

        
        // User::factory(10)->create();
    }
}
