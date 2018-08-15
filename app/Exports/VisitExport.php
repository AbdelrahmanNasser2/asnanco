<?php

namespace App\Exports;

use App\Visit;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Patient;

class VisitExport implements FromCollection
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
    	$rev = array_reverse(['اسم المريض','اسم الدكتور','تاريخ الزيارة','المدفوع','المتبقي  ','تعليق']);
        $c = collect([$rev]);
    	
    	if($this->from == '' or $this->to == ''){
            $vists_array = Visit::all();
        }else{
            $vists_array = Visit::whereBetween('visit_date', [$this->from." 00:00:00", $this->to." 00:00:00"])->orWhereDate('created_at',$this->to." 00:00:00")->get();
        

        }
    	
    	foreach ( $vists_array as $value) {

    		$patient = Patient::find($value['patient_id']);

    		// $visit = new Visit();      
     		
     		$visit_array = array();

     		

			$visit_array[] = $value['comment'];

			$visit_array[] = $value['remain'];

			$visit_array[] = $value['paid'];
    		
			$visit_array[] = $value['visit_date'];
	    

    		$visit_array[] = $value['dr_name'];
    		

    		$visit_array[] = $patient->name;
    		$c = $c->concat([$visit_array]);
    	
    	}
    	
    	return $c;
    }
}
