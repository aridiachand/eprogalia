<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanApprovalLevel extends Model
{
    use HasFactory;

    protected $table = 'jabatan_approval_vendor';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
