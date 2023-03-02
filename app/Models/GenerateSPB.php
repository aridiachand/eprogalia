<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateSPB extends Model
{
    use HasFactory;

    protected $table = 'generate_spb';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
