<?php

namespace App\Exports;
use App\Exports\ReparDevicesExport;
use Excel;
use App\Repair_Device;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReparDevicesExport implements FromCollection
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
        $reverse = array('تعليق','التكلفه	','اسم المُتصل	','تاريخ زيارة الشركه	','تاريخ ابلاغ العطل	','تاريخ ظهور العطل	','اسم شركة الصيانه');
        
        $reverse = array_reverse($reverse);
    	
    	$c = collect([$reverse]);
    	
    	if($this->from == '' or $this->to == ''){
            $repairs_array = Repair_Device::all();
        }else{
            $repairs_array = Repair_Device::whereBetween('created_at', [$this->from." 00:00:00", $this->to." 00:00:00"])->orWhereDate('created_at',$this->to." 00:00:00")->get();
        }

    	foreach ($repairs_array as $value) {
    	
    		$repair = new Repair_Device();
    		
			$repair->company_name = $value['company_name'];

	        $repair->appearience_date = $value['appearience_date'];
	       
	        $repair->call_date = $value['call_date'];
	       
	        $repair->visit_date = $value['visit_date'];
	       
			$repair->caller_name = $value['caller_name'];
		
	        $repair->cost = $value['cost'];

			$repair->comment = $value['comment'];
			
			$c = $c->concat([$repair]);

    	}
    	return $c;
    }


}
