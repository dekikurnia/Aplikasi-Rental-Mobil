<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;
use App\LogPeminjaman;


class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = Pelanggan::where('no_ktp', '10982932039039347');
        LogPeminjaman::create(['id'=>'60a6a316-9ca9-4214-b5c6-e7b33a77e860', 'id_pelanggan' =>'39515560-4be8-4b82-8040-b5c38cf5f9e0', 'id_kendaraan'=> '345d4b79-ec40-4390-8a71-9261df8d4c82', 'dikembalikan' => 0]);
        LogPeminjaman::create(['id'=>'58a6a316-9ca9-4214-b5c6-e7b33a77e860', 'id_pelanggan' =>'39515560-4be8-4b82-8040-b5c38cf5f9e0', 'id_kendaraan'=>
        	'5c3958b3-5bd1-4b95-9078-8ad02e6668fd', 'dikembalikan' => 0]);
        LogPeminjaman::create(['id'=>'56a6a316-9ca9-4214-b5c6-e7b33a77e860', 'id_pelanggan' =>'39515560-4be8-4b82-8040-b5c38cf5f9e0', 'id_kendaraan'=>
        	'5fdb70b3-1638-493e-ac54-a3104adbb2b0', 'dikembalikan' => 1]);

    }
}
