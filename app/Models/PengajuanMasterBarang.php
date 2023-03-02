<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMasterBarang extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_master_barang';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
