<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements Import
{
    public function model(array $row)
    {
        return new Import([
            'rcn_no' => $row['RCN No.'],
            'purchasing_order_no' => $row['Purchasing Order No.'],
            'cancelled' => $row['Cancelled (O/N)'],
            'po_type' => $row['PO type'],
            'rcn_status' => $row['RCN status'],
            'status_date' => $row['Status date'],
            'status_author' => $row['Status author'],
            'priority' => $row['Priority (O/N)'],
            'tro_type' => $row['TRO type'],
            'branch_code' => $row['Branch Code'],
            'department_code' => $row['Department Code'],
            'tracking_file_no' => $row['Tracking File No.'],
            'order_no' => $row['Order N°'],
            'import_export' => $row['Import / Export'],
            'file_type' => $row['File type'],
            'planned_quantity_20' => $row['Planned quantity (20\')'],
            'planned_quantity_40' => $row['Planned quantity (40\')'],
            'planned_quantity_bulk_parcel' => $row['Planned quantity (Bulk and Parcel)'],
            'planned_weight_kgs' => $row['Planned weight (kgs)'],
            'goods_description' => $row['Goods description'],
            'goods_description_tro' => $row['Goods description TRO'],
            'parcel_seal_no' => $row['Parcel / Seal No.'],
            'parcel_bulk_container_no' => $row['Parcel / Bulk / Container No.'],
            'real_customer' => $row['Real customer'],
            'consignee_shipper' => $row['Consignee / Shipper'],
            'loading_country' => $row['Loading country'],
            'loading_place' => $row['Loading place'],
            'unloading_country' => $row['Unloading country'],
            'unloading_place' => $row['Unloading place'],
            'transporter_name' => $row['Transporter name'],
            'transporter_nationality' => $row['Transporter nationality'],
            'type_of_equipment' => $row['Type of equipment'],
            'vector' => $row['Vector'],
            'trailer' => $row['Trailer'],
            'carrier_contact' => $row['Carrier contact'],
            'estimated_rate' => $row['Estimated rate'],
            'currency' => $row['Currency'],
            'advance_percentage' => $row['Advance %'],
            'advance_amount' => $row['Advance amount'],
            'type_of_routing' => $row['Type of routing'],
            'escort' => $row['Escort (O/N)'],
            'dangerous' => $row['Dangerous (O/N)'],
            'dangerous_goods' => $row['Dangerous goods'],
            'controlled_temp' => $row['Controlled temp. (O/N)'],
            'temperature' => $row['Temperature'],
            'po_instructions' => $row['PO instructions'],
            'rcn_instructions' => $row['RCN instructions'],
            'advance_reference_actual' => $row['Advance reference (actual)'],
            'total_advance_actual' => $row['Total advance (actual)'],
            'invoice_reference_actual' => $row['Invoice reference (actual)'],
            'total_invoice_actual' => $row['Total invoice (actual)'],
            'anomaly' => $row['Anomaly (O/N)'],
            'anomaly_code' => $row['Anomaly code'],
            'anomaly_quantity' => $row['Anomaly quantity'],
            'anomaly_weight_kgs' => $row['Anomaly weight (kgs)'],
            'gtp' => $row['GTP'],
            'author_gtp' => $row['Author GTP'],
            'gtp_comment' => $row['GTP comment'],
            'plan_code' => $row['Plan code'],
            'corridor_departure' => $row['Corridor departure'],
            'corridor_destination' => $row['Corridor destination'],
            'file_date' => $row['File date'],
            'ata_date' => $row['ATA date'],
            'ready_for_dispatch_date' => $row['Ready for dispatch date'],
            'rcn_date' => $row['RCN date'],
            'rcn_author' => $row['RCN author'],
            'rcn_validation_date' => $row['RCN validation date'],
            'rcn_validation_author' => $row['RCN validation author'],
            'loading_date' => $row['Loading date'],
            'loading_author' => $row['Loading author'],
            'departure_date' => $row['Departure date'],
            'departure_author' => $row['Departure author'],
            'arrival_date' => $row['Arrival date'],
            'arrival_author' => $row['Arrival author'],
            'unloading_date' => $row['Unloading date'],
            'unloading_author' => $row['Unloading author'],
            'transit_time_departure_arrival' => $row['Transit time departure / arrival'],
            'transit_time_loading_unloading' => $row['Transit time loading / unloading'],
            'interchange_shipping_date' => $row['Interchange shipping date'],
            'completed_interchange_shipping' => $row['% of completed interchange shipping'],
            'printing' => $row['Printing O/N'],
            'printing_date' => $row['Printing Date'],
            'printing_user' => $row['Printing User'],
            'internal_comment' => $row['Internal comment'],
            'external_comment' => $row['External comment'],
        ]);
    }
}
