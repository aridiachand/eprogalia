<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangeApproveVendor extends Model
{
    use HasFactory;

    protected $table = 'range_approve_vendor';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
