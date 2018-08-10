<?php

namespace App\Exports;

use App\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::all();
    }

    public function headings(): array
    {
        return [
            'اسم المشتري',
            'تعليق',
            'التكلفة',
            'تاريخ الشراء',
            'اسم المورد'
        ];
    }
}
