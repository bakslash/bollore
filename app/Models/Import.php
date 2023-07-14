<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Import extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'imports';

    protected $fillable = [
        'Tracking Code',
        'MBA Dept/Com',
        'Delivery Country',
        'Delivery Location',
        'Shipper',
        'Consignee',
        'Cargo Description',
        'Quantity',
        'Vessel',
        'Shipping Line',
        'Vessel ETA',
        'Manifest Advised',
        'Vessel Arrival',
        'Vessel Berth',
        'Cargo Transfered',
        'Cargo Type',
        'CNTR/ Identification Number',
        'Size/Type',
        'Qty Loaded',
        'Wgt Loaded',
        'Teu',
        'File Validation',
        'Documents Ok',
        'Cargo Discharged',
        'OBL Received',
        'Entry Lodged',
        'Entry Passed',
        'Customs Release Order',
        'Ready for Dispatch',
        'Transport Mode',
        'Departure',
        'Truck/Wagon',
        'Arrival Malaba',
        'Departure Malaba',
        'Arrival Malaba Ug',
        'Departure Malaba UG',
        'Arrival',
        'TC Interchange',
        'Last Comment',
        'Cargo Manifest advised - SCT entry',
        'SCT entry - Cargo ready for dispatch',
        'Cargo ready for dispatch - Departure',
        'Departure - Destination',
        'Cargo Discharged - Cargo ready for dispatch',
        'Cargo ready for dispatch - Destination',
        'Cargo Discharged - Destination',
        'Border in (arrival malaba Ky side - departure)',
        'Border out (arrival Malaba Ug side - departure)',
        'Documentation vs Cargo Discharged',
        'Storage KPI',
    ];
}
