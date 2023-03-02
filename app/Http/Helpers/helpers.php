<?php

use App\Models\Top;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

function format_uang($angka)
{
    return number_format($angka, 0, ',', '.');
}

function generate_kode_barang($value)
{
    $threshold = 8;
    return sprintf("%0" . $threshold . "s", $value);
}

function generate_kode_permintaan($value)
{
    $threshold = 4;
    return sprintf("%0" . $threshold . "s", $value);
}

function generate_kode_permintaan_new($value, $branch, $tanggal)
{
    $threshold = 4;
    $norut = sprintf("%0" . $threshold . "s", $value);
    return $branch . '/' . $tanggal . '/PBJ-' . $norut;
}

function min_tech_expert()
{
    $harga = 1000000;
    return $harga;
}

function pengajuan_master_barang($value, $branch, $tanggal)
{
    $threshold = 5;
    $norut = sprintf("%0" . $threshold . "s", $value);
    return 'PMB-' . $branch . $tanggal .  $norut;
}


function grand_total_vendor($kode_permintaan,$id_vendor)
{
    $grand_total_vendor = DB::select("select sum(nilai_harga * qty) as grandtotal
    from pemilihan_vendor pv
    where kode_permintaan = '$kode_permintaan' and id_vendor =$id_vendor");

    // dd($grand_total_vendor[0]->grandtotal);
    return  $grand_total_vendor[0]->grandtotal;

}

function top_vendor($top,$kode_permintaan,$id_vendor)
{
// if top = 1(get name top)
// if top = 2(get ket top)
// if top = 3(tgl quotation)
// if top = 4(attachment file path)


$permintaan_vendor = DB::select("select max(id_top) as id_top,max(pv.keterangan_top) as keterangan_top,
(select nama_top from top where id = max(pv.id_top)) as nama_top,
max(tgl_quotation) as tgl_quotation,
max(file_path) as file_path
from pemilihan_vendor pv where kode_permintaan = '$kode_permintaan' and id_vendor =$id_vendor
group by id_vendor");

if($top == 1){
    return $permintaan_vendor[0]->nama_top;
    }elseif($top == 2){
        return $permintaan_vendor[0]->keterangan_top;
    }elseif($top == 3){
        return date("d/m/Y", strtotime($permintaan_vendor[0]->tgl_quotation));
        // return Carbon::createFromFormat('Y-m-d', $permintaan_vendor[0]->tgl_quotation)->format('d/m/Y');
    }elseif($top == 4){
        return $permintaan_vendor[0]->file_path;
    }
}
