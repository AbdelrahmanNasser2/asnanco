<?php

namespace App\Exports;
use App\Exports\ReparDevicesExport;
use Excel;
use App\Repair_Device;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReparDevicesExport implements FromCollection
{

    /**
    * @return \Illuminate\Support\Collection
    */


    public function collection()
    {
        $reverse = array('تعليق','التكلفه	','اسم المُتصل	','تاريخ زيارة الشركه	','تاريخ ابلاغ العطل	','تاريخ ظهور العطل	','اسم شركة الصيانه');
        
        $reverse = array_reverse($reverse);
    	
    	$c = collect([$reverse]);
    	
    	$repairs_array = Repair_Device::all();

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
