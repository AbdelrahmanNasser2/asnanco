<?php

namespace App\Exports;

use App\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $c = collect([['امراض اخرى','التشخيص العام','الوظيفه','العنوان','الموبايل  ','الاسم']]);
    	
    	$paitents_array = Patient::all();
    	
    	foreach ( $paitents_array as $value) {
    	
    		$patient = new Patient();      
     	
			$patient->other_diseases = $value['other_diseases'];

			$patient->general_diagnosis = $value['general_diagnosis'];

			$patient->job = $value['job'];

			$patient->address = $value['address'];
    		
			$patient->phone = $value['phone'];
	    

    		$patient->name = $value['name'];

    		$c = $c->concat([$patient]);
    	
    	}
    	
    	return $c;
    }
}
