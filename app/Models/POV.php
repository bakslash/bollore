<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POV extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pov';

    protected $fillable = [
        "pname"
    ];

}
