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

    	
    	$c = collect([['المورد اسم','الشراء تاريخ','التكلفة','تعليق  ','المٌشترى اسم']]);
    	$purchases_array = Purchase::all();
    	foreach ( $purchases_array as $value) {
    		$purchase = new Purchase();
	       if (!preg_match('/[^A-Za-z0-9]/', $value['company_name'])) {
  					// string contains only english letters & digits
  					$purchase->resource_name = $value['resource_name'];
				}else{
					$purchase->resource_name = $this->toarabic($value['resource_name']);
				}

	        $purchase->purchase_date = $value['purchase_date'];
	        $purchase->cost = $value['cost'];
	        if (!preg_match('/[^A-Za-z0-9]/', $value['comment'])) // '/[^a-z\d]/i' should also work.
				{
  					// string contains only english letters & digits
  					$purchase->comment = $value['comment'];

				}else{
					$purchase->comment = $this->toarabic($value['comment']);
				}
	       if (!preg_match('/[^A-Za-z0-9]/', $value['officer'])) // '/[^a-z\d]/i' should also work.
				{
  					// string contains only english letters & digits
  					$purchase->officer = $value['officer'];

				}else{
					$purchase->officer = $this->toarabic($value['officer']);
				}
    		$c = $c->concat([$purchase]);
    	}
    	
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
