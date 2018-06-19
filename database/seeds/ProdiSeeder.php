<?php

use Illuminate\Database\Seeder;
use App\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'prodi' => "Teknik Informatika (TI)"
        ]);
        Prodi::create([
            'prodi' => "Desain Komunikasi Visual (DKV)"
        ]);
        Prodi::create([
            'prodi' => "Sistem Komputer (SK)"
        ]);
        Prodi::create([
            'prodi' => "Profesional Bisni Manajemen (PBM)"
        ]);
        Prodi::create([
            'prodi' => "Akuntansi (AK)"
        ]);
    }
}
