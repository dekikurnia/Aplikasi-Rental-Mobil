<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(MerkSeeder::class);
        //$this->call(PelangganSeeder::class);
        $this->call(KendaraanSeeder::class);
    }
}
