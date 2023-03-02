<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorTerpilih extends Model
{
    use HasFactory;

    protected $table = 'vendor_terpilih';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
