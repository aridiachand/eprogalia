<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = array(
            [
                'nama_kategori' => 'Medis',
                'id_user_input' => 0
            ],
            [
                'nama_kategori' => 'Non Medis',
                'id_user_input' => 0
            ]
        );

        Kategori::insert($kategori);
    }
}
