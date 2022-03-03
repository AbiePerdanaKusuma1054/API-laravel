<?php

namespace Database\Seeders;

use App\Models\Kategori_uraian;
use Illuminate\Database\Seeder;

class KategoriUraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kategori_uraian::create([
            'kategori_uraian' => 'observasi'
        ]);
        Kategori_uraian::create([
            'kategori_uraian' => 'terapeutik'
        ]);
        Kategori_uraian::create([
            'kategori_uraian' => 'edukasi'
        ]);
        Kategori_uraian::create([
            'kategori_uraian' => 'kolaborasi'
        ]);
    }
}
