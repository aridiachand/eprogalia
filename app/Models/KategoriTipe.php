<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTipe extends Model
{
    use HasFactory;

    protected $table = 'kategori_tipe';
    protected $primaryKey = 'id_kategori_tipe';
    protected $guarded = [];
}
