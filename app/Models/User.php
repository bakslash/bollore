<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'stf_StaffID',
        'stf_uname',
        'stf_Names',
        'stf_email',
        'stf_Description',
    ];
}
