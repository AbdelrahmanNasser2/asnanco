<?php

namespace App\Exports;

use App\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalaryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        
    	$c = collect([[$this->toarabic('اسم الموظف'),$this->toarabic('تاريخ الأستلام	'),$this->toarabic('عدد أيام الشغل	'),$this->toarabic('عدد أيام الغياب	'),$this->toarabic('عدد أيام التأخير	'),$this->toarabic('المرتب	'),$this->toarabic('قيمة الخصومات	'),$this->toarabic('صافى المرتب	')]]);
    	$salaries_array = Salary::all();
    	foreach ($salaries_array as $value) {
    		$salary = new Salary();
    		if (!preg_match('/[^A-Za-z0-9]/', $value['emp_name'])) {
  					// string contains only english letters & digits
  					$salary->company_name = $value['emp_name'];
				}else{
					$salary->company_name = $this->toarabic($value['emp_name']);
				}

	        $salary->delivery_date = $value['delivery_date'];
	       
	        $salary->work_days = $value['work_days'];
	       
	        $salary->absence_days = $value['absence_days'];
	       	       
	        $salary->delay_days = $value['delay_days'];

	        $salary->salary = $value['salary'];
	        
	        $salary->discount = $value['discount'];

	        $salary->net_salary = $value['net_salary'];
	 
				$c = $c->concat([$salary]);

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
