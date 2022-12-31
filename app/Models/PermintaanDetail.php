<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    use HasFactory;

    protected $table = 'permintaan_detail';
    protected $primaryKey = 'id_permintaan_detail';
    protected $guarded = [];
}
