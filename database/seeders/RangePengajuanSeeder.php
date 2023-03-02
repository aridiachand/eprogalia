<?php

namespace Database\Seeders;

use App\Models\RangePengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangePengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rangepengajuan = array(
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "NON CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 0,
                "nilai_total_max" => 5000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "NON CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 5000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "NON CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 5000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "NON CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 1000000,
                "nilai_total_max" => 5000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "NON CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 0,
                "nilai_total_max" => 1000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 0,
                "nilai_total_max" => 5000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 5000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 5000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 1000000,
                "nilai_total_max" => 5000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "CITO",
                "rutin_nonrutin" => "NON RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 0,
                "nilai_total_max" => 1000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "",
                "rutin_nonrutin" => "RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 10000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "",
                "rutin_nonrutin" => "RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 10000000,
                "nilai_total_max" => 999999999
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "",
                "rutin_nonrutin" => "RUTIN",
                "nilai_satuan_min" => 1000000,
                "nilai_satuan_max" => 999999999,
                "nilai_total_min" => 1000000,
                "nilai_total_max" => 10000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "",
                "rutin_nonrutin" => "RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 1000000,
                "nilai_total_max" => 10000000
            ],
            [
                "farmasi_nonfarmasi" => "NON FARMASI",
                "cito_noncito" => "",
                "rutin_nonrutin" => "RUTIN",
                "nilai_satuan_min" => 0,
                "nilai_satuan_max" => 1000000,
                "nilai_total_min" => 0,
                "nilai_total_max" => 1000000
            ]


        );

        RangePengajuan::insert($rangepengajuan);
    }
}
