<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            'Nis' => '539211222',
            'nama' => 'Muhammad Abdullah',
            'Kelas' => 'XI',
            'tempat_lahir' => 'Kediri',
            'tanggal_lahir' => '2006-05-22',
            'alamat' => 'Jl. Irawati II No. 2 Surabaya',
        ]);

        Anggota::create([
            'Nis' => '539211221',
            'nama' => 'Haykal Rezha',
            'Kelas' => 'XI',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2006-02-12',
            'alamat' => 'Jl. Bolodewo I No. 12 Surabaya',
        ]);

        Anggota::create([
            'Nis' => '539211221',
            'nama' => 'Firdy Putra',
            'Kelas' => 'XI',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2005-11-09',
            'alamat' => 'Jl. Sidotopo II No. 2 Surabaya',
        ]);

        Anggota::create([
            'Nis' => '539211221',
            'nama' => 'Irgi Asy Syifa',
            'Kelas' => 'X',
            'tempat_lahir' => 'Solo',
            'tanggal_lahir' => '2007-11-07',
            'alamat' => 'Jl. Aja Dulu No. 2 Solo',
            
        ]);

        Anggota::create([
            'Nis' => '539211220',
            'nama' => 'Muhammad Naufal',
            'Kelas' => 'XI',
            'tempat_lahir' => 'Sidoarjo',
            'tanggal_lahir' => '2006-05-09',
            'alamat' => 'Jl. Kenjeran No. 24 Surabaya',
        ]);
    }
}
