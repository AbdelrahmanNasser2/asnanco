<?php

namespace App\Exports;
use Illuminate\Database\Eloquent\Collection;
use App\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    	
    	$c = collect([['اسم المورد','تاريخ الشراء	','التكلفة','تعليق  ','اسم المٌشترى	']]);
    	
    	$purchases_array = Purchase::all();
    	
    	foreach ( $purchases_array as $value) {
    	
    		$purchase = new Purchase();      
     	
     		$purchase->resource_name = $value['resource_name'];
	    
		    $purchase->purchase_date = $value['purchase_date'];
	    
	        $purchase->cost = $value['cost'];
		
			$purchase->comment = $value['comment'];
		
			$purchase->officer = $value['officer'];
    	
    		$c = $c->concat([$purchase]);
    	
    	}
    	
    	return $c;
  
    }


}
