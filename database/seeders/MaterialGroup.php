<?php

namespace Database\Seeders;

use App\Models\Materialgroup as ModelsMaterialGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materialgroup = array(
                [
                    "kode_bentuk" => "MFO0001",
                    "bentuk" => "OBAT-OBAT TERTENTU"
                ],
                [
                    "kode_bentuk" => "MFO0005",
                    "bentuk" => "BAHAN BERBAHAYA DAN BERACUN (B3)"
                ],
                [
                    "kode_bentuk" => "MFO0006",
                    "bentuk" => "ORAL"
                ],
                [
                    "kode_bentuk" => "MFO0007",
                    "bentuk" => "INJEKSI"
                ],
                [
                    "kode_bentuk" => "MFO0008",
                    "bentuk" => "INFUS"
                ],
                [
                    "kode_bentuk" => "MFO0009",
                    "bentuk" => "OBAT LUAR"
                ],
                [
                    "kode_bentuk" => "MFO0010",
                    "bentuk" => "REAGEN LAB"
                ],
                [
                    "kode_bentuk" => "MFO0011",
                    "bentuk" => "INHALASI"
                ],
                [
                    "kode_bentuk" => "MFO0012",
                    "bentuk" => "VAKSIN"
                ],
                [
                    "kode_bentuk" => "MFO0013",
                    "bentuk" => "SUPPOSITORIA & OVULA"
                ],
                [
                    "kode_bentuk" => "MFO0014",
                    "bentuk" => "INSULIN"
                ],
                [
                    "kode_bentuk" => "MFA0001",
                    "bentuk" => "ALAT KESEHATAN"
                ],
                [
                    "kode_bentuk" => "MFA0002",
                    "bentuk" => "GAS MEDIS"
                ],
                [
                    "kode_bentuk" => "MG001",
                    "bentuk" => "ALAT TULIS"
                ],
                [
                    "kode_bentuk" => "MG002",
                    "bentuk" => "CETAKKAN"
                ],
                [
                    "kode_bentuk" => "MG003",
                    "bentuk" => "DAPUR/GIZI"
                ],
                [
                    "kode_bentuk" => "MG004",
                    "bentuk" => "LAUNDRY/LINEN"
                ],
                [
                    "kode_bentuk" => "MG005",
                    "bentuk" => "INVENTARIS"
                ],
                [
                    "kode_bentuk" => "MG006",
                    "bentuk" => "IT"
                ],
                [
                    "kode_bentuk" => "MG007",
                    "bentuk" => "MEDIS"
                ],
                [
                    "kode_bentuk" => "MG008",
                    "bentuk" => "RUMAH TANGGA"
                ],
                [
                    "kode_bentuk" => "MG009",
                    "bentuk" => "TEKNISI"
                ],
                [
                    "kode_bentuk" => "MG010",
                    "bentuk" => "NON MEDIS"
                ],
                [
                    "kode_bentuk" => "MG011",
                    "bentuk" => "COVID 19"
                ],
                [
                    "kode_bentuk" => "MFO0004",
                    "bentuk" => "PSIKOTROPIKA"
                ],
                [
                    "kode_bentuk" => "MFO0003",
                    "bentuk" => "NARKOTIKA"
                ],
                [
                    "kode_bentuk" => "MFO0002",
                    "bentuk" => "HIGH ALERT MEDICATION"
                ],
        );
        array_map(function (array $material) {
            ModelsMaterialGroup::query()->updateOrCreate(
                ['bentuk' => $material['bentuk']],
                $material
            );
        }, $materialgroup);
    }
}
