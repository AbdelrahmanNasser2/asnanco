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
        
    	$c = collect([['اسم الموظف','تاريخ الأستلام	','عدد أيام الشغل	','عدد أيام الغياب	','عدد أيام التأخير	','المرتب	','قيمة الخصومات	','صافى المرتب	']]);
    	
    	$salaries_array = Salary::all();
    	
    	foreach ($salaries_array as $value) {
    	
    		$salary = new Salary();

  			$salary->company_name = $value['emp_name'];	
				
	        $salary->delivery_date = $value['delivery_date'];
	       
	        $salary->work_days = $value['work_days'];
	       
	        $salary->absence_days = $value['absence_days'];
	       	       
	        $salary->delay_days = $value['delay_days'];

	        $salary->salary = $value['salary'];
	        
	        $salary->discount = $value['discount'];

	        $salary->net_salary = $value['net_salary'];
	 
			$c = $c->concat([$salary]);

    	}

    	return $c;
    }

}
