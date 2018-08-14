<?php

namespace App\Exports;

use App\Lab;
use Maatwebsite\Excel\Concerns\FromCollection;

class LabExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $headers = array_reverse(['اسم المعمل','تاريخ التسليم','تاريخ الأستلام','التكلفة']);
        $c = collect([$headers]);
        $labs_array = Lab::all();
        foreach ($labs_array as $value) {
        	$lab = new Lab();

        	$lab->cost = $value['cost'];

        	$lab->receipt_date = $value['receipt_date'];

        	$lab->delivery_date = $value['delivery_date'];
 
        	$lab->lab_name = $value['lab_name'];

        	$c = $c->concat([$lab]);

        }
        return $c;
    }
}
