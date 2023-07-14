<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Import;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
   
 
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        if ($extension === 'csv') {
            $data = array_map('str_getcsv', file($file));

            $headerRow = array_shift($data);

            foreach ($data as $row) {
                $rowData = [
                    'Tracking Code' => $row[0],
                    'MBA Dept/Com' => $row[1],
                    'Delivery Country' => $row[2],
                    'Delivery Location' => $row[3],
                    'Shipper' => $row[4],
                    'Consignee' => $row[5],
                    'Cargo Description' => $row[6],
                    'Quantity' => $row[7],
                    'Vessel' => $row[8],
                    'Shipping Line' => $row[9],
                    'Vessel ETA' => $this->formatDateTime($row[10]),
                    'Manifest Advised' => $this->formatDateTime($row[11]),
                    'Vessel Arrival' => $this->formatDateTime($row[12]),
                    'Vessel Berth' => $this->formatDateTime($row[13]),
                    'Cargo Transfered' => $this->formatDateTime($row[14]),

                    'Cargo Type' => $row[15],
                    'CNTR/ Identification Number' => $row[16],
                    'Size/Type' => $row[17],
                    'Qty Loaded' => $row[18],
                    'Wgt Loaded' => $row[19],
                    'Teu' => $row[20],
                    'File Validation' => $row[21],
                    'Documents Ok' => $row[22],
                    'Cargo Discharged' => $row[23],
                    'OBL Received' => $row[24],
                    'Entry Lodged' => $row[25],
                    'Entry Passed' => $row[26],
                    'Customs Release Order' => $row[27],
                    'Ready for Dispatch' => $row[28],
                    'Transport Mode' => $row[29],
                    'Departure' => $this->formatDateTime($row[30]),
                    'Truck/Wagon' => $row[31],
                    'Arrival Malaba' => $this->formatDateTime($row[32]),
                    'Departure Malaba' => $this->formatDateTime($row[33]),
                    'Arrival Malaba Ug' => $this->formatDateTime($row[34]),
                    'Departure Malaba UG' => $this->formatDateTime($row[35]),
                    'Arrival' => $this->formatDateTime($row[36]),
                    'TC Interchange' => $row[37],
                    'Last Comment' => $row[38],
                    'Cargo Manifest advised - SCT entry' => $row[39],
                    'SCT entry - Cargo ready for dispatch' => $row[40],
                    'Cargo ready for dispatch - Departure' => $row[41],
                    'Departure - Destination' => $row[42],
                    'Cargo Discharged - Cargo ready for dispatch' => $row[43],
                    'Cargo ready for dispatch - Destination' => $row[44],
                    'Cargo Discharged - Destination' => $row[45],
                    'Border in (arrival malaba Ky side - departure)' => $row[46],
                    'Border out (arrival Malaba Ug side - departure)' => $row[47],
                    'Documentation vs Cargo Discharged' => $row[48],
                    'Storage KPI' => $row[49],
                ];

                Import::create($rowData);
            }
        } else {
            Excel::import(new Import, $file);
        }

        $importData = new Import();
        $importData->filename = $file->getClientOriginalName();
        $importData->save();

        return redirect()->back()->with('success', 'Import completed.');
    }private function formatDateTime($value)
    {
        // Check if the value is empty
        if (empty($value)) {
            return null;
        }
    
        // Format the datetime value
        try {
            // Check if the value is already in the correct format
            if (preg_match('/^\d{2}-[A-Za-z]{3}-\d{2}$/', $value)) {
                $datetime = Carbon::createFromFormat('d-M-y', $value);
                return $datetime->format('Y-m-d');
            } elseif (preg_match('/^\d{2}-[A-Za-z]{3}-\d{4}$/', $value)) {
                $datetime = Carbon::createFromFormat('d-M-Y', $value);
                return $datetime->format('Y-m-d');
            } elseif (preg_match('/^\d{2}-\d{2}-\d{4}$/', $value)) {
                $datetime = Carbon::createFromFormat('d-m-Y', $value);
                return $datetime->format('Y-m-d');
            } else {
                // Handle the case when the value is not in the expected format
                return null; // or return a default value that suits your needs
            }
        } catch (\Exception $e) {
            return null;
        }
    }
        

}
