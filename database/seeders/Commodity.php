<?php

namespace Database\Seeders;

use App\Models\Commodity as ModelsCommodity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Commodity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commoditys = array(
            [
                "kode_lokasi_tera" => 5,
                "lokasi_tera" => "CL001",
                "keterangan_lokasi" => "LOG - ALAT TULIS",
                "keterangan" => "ALAT TULIS"
            ],
            [
                "kode_lokasi_tera" => 6,
                "lokasi_tera" => "CL002",
                "keterangan_lokasi" => "LOG - CETAKKAN",
                "keterangan" => "CETAKKAN"
            ],
            [
                "kode_lokasi_tera" => 7,
                "lokasi_tera" => "CL003",
                "keterangan_lokasi" => "LOG - BAHAN MAKANAN",
                "keterangan" => "BAHAN MAKANAN"
            ],
            [
                "kode_lokasi_tera" => 8,
                "lokasi_tera" => "CL004",
                "keterangan_lokasi" => "LOG - LINEN",
                "keterangan" => "LINEN"
            ],
            [
                "kode_lokasi_tera" => 9,
                "lokasi_tera" => "CL005",
                "keterangan_lokasi" => "LOG - RUMAH TANGGA",
                "keterangan" => "RUMAH TANGGA"
            ],
            [
                "kode_lokasi_tera" => 10,
                "lokasi_tera" => "CL006",
                "keterangan_lokasi" => "LOG - PAKET MANDI",
                "keterangan" => "PAKET MANDI"
            ],
            [
                "kode_lokasi_tera" => 11,
                "lokasi_tera" => "CL007",
                "keterangan_lokasi" => "LOG - TEKNIK",
                "keterangan" => "TEKNIK"
            ],
            [
                "kode_lokasi_tera" => 12,
                "lokasi_tera" => "CL008",
                "keterangan_lokasi" => "LOG - MEDIS",
                "keterangan" => "MEDIS"
            ],
            [
                "kode_lokasi_tera" => 13,
                "lokasi_tera" => "CL009",
                "keterangan_lokasi" => "LOG - SPARE PART",
                "keterangan" => "SPARE PART"
            ],
            [
                "kode_lokasi_tera" => 14,
                "lokasi_tera" => "CL010",
                "keterangan_lokasi" => "LOG - GERABAH",
                "keterangan" => "GERABAH"
            ],
            [
                "kode_lokasi_tera" => 15,
                "lokasi_tera" => "CL011",
                "keterangan_lokasi" => "LOG - PLASTIK PLASTIK",
                "keterangan" => "PLASTIK PLASTIK"
            ],
            [
                "kode_lokasi_tera" => 16,
                "lokasi_tera" => "CL012",
                "keterangan_lokasi" => "LOG - INVENTARIS",
                "keterangan" => "INVENTARIS"
            ],
        );
        array_map(function (array $commodity) {
            ModelsCommodity::query()->updateOrCreate(
                ['keterangan' => $commodity['keterangan']],
                $commodity
            );
        }, $commoditys);
    }
}
