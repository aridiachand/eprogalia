<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangePengajuan extends Model
{
    use HasFactory;

    protected $table = 'range_pengajuan';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
