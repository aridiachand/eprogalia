<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'commodity';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
