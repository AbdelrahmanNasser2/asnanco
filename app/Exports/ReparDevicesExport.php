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
        
    	$c = collect([['تعليق','التكلفه	','المٌتصل اسم','الشركة زيارة تاريخ','العطل ابلاغ تاريخ','العطل ظهور تاريخ','الصيانة شركة اسم']]);
    	$repairs_array = Repair_Device::all();
    	$i = 0;
    	$arr = array();
    	foreach ($repairs_array as $value) {
    		$repair = new Repair_Device();
    		if (!preg_match('/[^A-Za-z0-9]/', $value['company_name'])) {
  					// string contains only english letters & digits
  					$repair->company_name = $value['company_name'];
				}else{
					$repair->company_name = $this->toarabic($value['company_name']);
				}

	        $repair->appearience_date = $value['appearience_date'];
	       
	        $repair->call_date = $value['call_date'];
	       
	        $repair->visit_date = $value['visit_date'];
	       
	        if (!preg_match('/[^A-Za-z0-9]/', $value['caller_name'])){
  					// string contains only english letters & digits
  					$repair->caller_name = $value['caller_name'];
				}else{
					$repair->caller_name = $this->toarabic($value['caller_name']);
				}
	       
	        $repair->cost = $value['cost'];

	        if (!preg_match('/[^A-Za-z0-9]/', $value['comment'])) // '/[^a-z\d]/i' should also work.
				{
  					// string contains only english letters & digits
  					$repair->comment = $value['comment'];

				}else{
					$repair->comment = $this->toarabic($value['comment']);
				}
				
	        //$repair->comment = $this->toarabic($value['comment']);
				$c = $c->concat([$repair]);

    	}

    	//$c->dd();
    	return $c;
    }


   public function toarabic($string){
    	$string1 = "";
    	$separated = explode(' ',$string);
	    $reversed = array_reverse($separated);
		foreach ($reversed as $key) {
	        $string1 .= $key." ";
		}
	        return $string1;
    }
}
