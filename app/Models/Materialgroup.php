<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialgroup extends Model
{
    use HasFactory;

    protected $table = 'material_group';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
