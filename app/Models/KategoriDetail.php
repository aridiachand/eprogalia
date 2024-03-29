<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDetail extends Model
{
    use HasFactory;

    protected $table = 'kategori_detail';
    protected $primaryKey = 'id_kategori_detail';
    protected $guarded = [];
}
