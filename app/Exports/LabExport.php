<?php

namespace App\Exports;

use App\Lab;
use Maatwebsite\Excel\Concerns\FromCollection;

class LabExport implements FromCollection
{

     public function __construct($from , $to)
    {
        $this->from =$from ;
        $this->to =$to;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $headers = array_reverse(['اسم المعمل','تاريخ التسليم','تاريخ الأستلام','التكلفة','سُجل بواسطة']);
        $c = collect([$headers]);
         if($this->from == '' or $this->to == ''){
            $labs_array = Lab::all();
        }else{
            $labs_array = Lab::whereBetween('created_at', [$this->from." 00:00:00", $this->to." 00:00:00"])->orWhereDate('created_at',$this->to." 00:00:00")->get();
        }
        foreach ($labs_array as $value) {
        	$lab = new Lab();

            $lab->created_by = $value['created_by'];

        	$lab->cost = $value['cost'];

        	$lab->receipt_date = $value['receipt_date'];

        	$lab->delivery_date = $value['delivery_date'];
 
        	$lab->lab_name = $value['lab_name'];


        	$c = $c->concat([$lab]);

        }
        return $c;
    }
}
