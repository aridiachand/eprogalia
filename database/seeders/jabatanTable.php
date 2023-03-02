<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jabatanTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = array(
            [
                'id_jabatan' => 1,
                'nama_jabatan' => 'staff'
            ],
            [
                'id_jabatan' => 2,
                'nama_jabatan' => 'supervisor'
            ],
            [
                'id_jabatan' => 3,
                'nama_jabatan' => 'manager'
            ],
            [
                'id_jabatan' => 4,
                'nama_jabatan' => 'general manager'
            ],
            [
                'id_jabatan' => 5,
                'nama_jabatan' => 'direktur'
            ],
            [
                'id_jabatan' => 6,
                'nama_jabatan' => 'presiden direktur'
            ],

        );

        Jabatan::insert($jabatan);
    }
}
