<?php

use Illuminate\Database\Seeder;
use App\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $pelanggan1 = Pelanggan::create(['id'=>'67a6a326-9ca9-4214-b5c6-e7b33a77e860', 'no_ktp'=>'1050245708900001', 'nama'=>'Ahmad Musaddeq', 'alamat'=>'Cihideung, Gg. Asri RT. 04/03, No. 90', 
          	'telepon'=>'081290903834']);
    }
}
