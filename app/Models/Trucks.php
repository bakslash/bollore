<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trucks extends Model
{
    use HasFactory;

    protected $table = 'trucks';
    protected $fillable = [
        "Tr_ID",
        "Tr_TruckRegNum",
        "Tr_TruckTrailer",
        "Tr_Type",
        "Tr_HaulierRep",
        "Tr_Hauler",
        "Tr_Within",
        "Tr_Deleted",
        "Tr_Cdate",
        "stf_cby",
    ];
}
