<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lab;

use App\Exports\LabExport;
use Excel;

use Datatables;

class LabController extends Controller
{
    public function index()
    {
        // $labss = Lab::all()->toArray();

        // if($labss)
        //     $labs = array($labss[sizeof($labss)-1]);
        // else
        //     $labs = array();

        return view('Lab.index');
    }

    function getdata()
    {
        $lab = Lab::all();
        return Datatables::of($lab)->make(true);
    }

    public function create()
    {
        return view('Lab.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'labName' => 'required',
            'deliveryDate' => 'required | date',
            'receiptDate' => 'required | date',
            'cost' => 'required | numeric',
            'select_file' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);

        $image = $request->file('select_file');

		$imgname = $image->getClientOriginalName();

        $image->move(public_path('images'), $imgname);

        $lab = new Lab([
            'lab_name' => $request->get('labName'),
            'delivery_date' => $request->get('deliveryDate'),
            'receipt_date' => $request->get('receiptDate'),
            'cost' => $request->get('cost'),
            'img_name' => $imgname
        ]);

        $lab->save();

        return redirect()->route('Lab.index')->with('success', 'تم إضافة الفاتورة');
    }

    public function edit($id)
    {
        $lab = Lab::find($id);

        return view('Lab.edit', compact('lab'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'labName' => 'required',
            'deliveryDate' => 'required | date',
            'receiptDate' => 'required | date',
            'cost' => 'required | numeric',
            'select_file' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);

        $lab = Lab::find($id);

        $lab->lab_name = $request->get('labName');
        $lab->delivery_date = $request->get('deliveryDate');
        $lab->receipt_date = $request->get('receiptDate');
        $lab->cost = $request->get('cost');
        
        $image = $request->file('select_file');

		$imgname = $image->getClientOriginalName();

        $image->move(public_path('images'), $imgname);

        
        $lab->img_name = $imgname;

        $lab->save();

        return redirect()->route('Lab.index')->with('success', 'تم التعديل');
    }

    public function search(Request $request)
    {
        $lab_name = $request->get('labName');
        $receipt_date = $request->get('recieptDate');

        $lab = Lab::where('lab_name', $lab_name)
                    ->Where('receipt_date', $receipt_date)
                    ->get();
        if($lab)
        {
           return view('Lab.show', compact('lab'));
        }
    }

    public function show($id)
    {
        $lab = Lab::find($id);
        
        return view('Lab.show', compact('lab'));
    }

    public function destroy($id)
    {
        $lab = Lab::find($id);

        $imgname = $lab->img_name;

   		unlink("images/" . $imgname);
   	
		$lab->delete();

        return redirect()->route('Lab.index')->with('success','تم الحذف');
    }

    public function excel($id)
    {
        return Excel::download(new LabExport,'labs.xlsx');
    }
}
