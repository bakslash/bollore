<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Haulers extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'haulers';

    protected $fillable = [
        "id",
        "hname"
    ];

    protected $primaryKey = 'id';

    // ...
}
