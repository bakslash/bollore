<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departmental extends Model
{
    use HasFactory,  SoftDeletes;

    protected $table = 'departmental';

    protected $fillable = [
        "dname"
    ];

}
