<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_upload extends Model
{
    use HasFactory;

    protected $table = 'file_upload';
    protected $primaryKey = 'id_file_upload';
    protected $guarded = [];
}
