<?php

namespace App\Exports;
use Illuminate\Database\Eloquent\Collection;
use App\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportabl;
class PurchaseExport implements FromCollection
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

    	$c = collect([['اسم المورد','تاريخ الشراء	','التكلفة','تعليق  ','اسم المٌشترى	']]);
    	
        if($this->from == '' or $this->to == ''){
            $purchases_array = Purchase::all();
    	}else{
            $purchases_array = Purchase::whereBetween('purchase_date', [$this->from." 00:00:00", $this->to." 00:00:00"])->orWhereDate('created_at',$this->to." 00:00:00")->get();
            // $purchases_array1 = Purchase::whereDate('created_at',$this->to." 00:00:00")->get();

        }
   
    	foreach ( $purchases_array as $value) {
    	
    		$purchase = new Purchase();      
            // 
     	    // if($value['created_at'] >= "2018-08-08" and $value['created_at'] <= "2018-08-12"){
     		
            $purchase->resource_name = $value['resource_name'];
	    
		    $purchase->purchase_date = $value['purchase_date'];
	    
	        $purchase->cost = $value['cost'];
		
			$purchase->comment = $value['comment'];
		
			$purchase->officer = $value['officer'];
    	
    		$c = $c->concat([$purchase]);
            // }
    	
    	}
    	//$c->dd();
    	 return $c;
  
    }


}
