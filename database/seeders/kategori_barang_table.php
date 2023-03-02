<?php

namespace Database\Seeders;

use App\Models\KategoriBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategori_barang_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_barang = array(
            [
                "kode_kategori_barang" => "RT",
                "nama_kategori_barang" => "RUMAH TANGGA"
            ],
            [
                "kode_kategori_barang" => "CT",
                "nama_kategori_barang" => "CETAKKAN"
            ],
            [
                "kode_kategori_barang" => "LL",
                "nama_kategori_barang" => "LAUNDRY/LINEN"
            ],
            [
                "kode_kategori_barang" => "TK",
                "nama_kategori_barang" => "TEKNISI"
            ],
            [
                "kode_kategori_barang" => "MD",
                "nama_kategori_barang" => "MEDIS"
            ],
            [
                "kode_kategori_barang" => "IT",
                "nama_kategori_barang" => "IT"
            ],
            [
                "kode_kategori_barang" => "IV",
                "nama_kategori_barang" => "INVENTARIS"
            ],
            [
                "kode_kategori_barang" => "DG",
                "nama_kategori_barang" => "DAPUR/GIZI"
            ]
        );
        KategoriBarang::insert($kategori_barang);
    }
}
