<?php

use Illuminate\Database\Seeder;
use App\Merk;
use App\Type;
use App\Kendaraan;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $type1 = Type::create(['id'=>'48a6a316-9ca9-4214-b5c6-e7b33a77e860', 'kode_type'=>'HTB', 'nama_type'=>'HATCH BACK']);
        $type2 = Type::create(['id'=>'58a6a316-9ca9-4214-b5c6-e7b33a77e860', 'kode_type'=>'SMLSDN', 'nama_type'=>'SMALL SEDAN']);
        $type3 = Type::create(['id'=>'68a6a316-9ca9-4214-b5c6-e7b33a77e860', 'kode_type'=>'MDMSDN', 'nama_type'=>'MEDIUM SEDAN']);
        $type4 = Type::create(['id'=>'78a6a316-9ca9-4214-b5c6-e7b33a77e860', 'kode_type'=>'LRGSDN', 'nama_type'=>'LARGE SEDAN']);
        $type5 = Type::create(['id'=>'98a6a316-9ca9-4214-b5c6-e7b33a77e860', 'kode_type'=>'MDMHTB', 'nama_type'=>'MEDIUM HATCH BACK']);
        $merk1 = Merk::create(['id'=>'825d4b79-ec40-4390-8a71-9261df8d4c82', 'kode_merk'=>'TYTAGY', 'nama_merk'=>'Toyota Agya', 'id_type'=>$type1->id]);
        $kendaraan1 = Kendaraan::create(['id'=>'345d4b79-ec40-4390-8a71-9261df8d4c82', 'no_plat'=>'F 1923 BE', 'tahun'=>'2011', 'tarif_perjam'=>'20000', 
            'status_rental'=>'Tersedia','id_merk'=>$merk1->id]);
    }
}
