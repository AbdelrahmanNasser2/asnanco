<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        if(sizeof($purchases) >= 1){
                $siz = sizeof($purchases);
                $purchase = array($purchases[$siz-1]);  
                return view('Purchases.index')->with('purchases',$purchase);
        }else{

                return view('Purchases.index')->with('purchases',$purchases);
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $this->validate($request, [
            'resource_name'  => 'required',
            'purchase_date'  => 'required',
            'cost' => 'required',
            'comment'  => 'required',
            'officer' => 'required'
        ]);

        $purchase = new Purchase();
        $purchase->resource_name = $request->get('resource_name');
        $purchase->purchase_date = $request->get('purchase_date');
        $purchase->cost = $request->get('cost');
        $purchase->comment = $request->get('comment');
        $purchase->officer = $request->get('officer');
        $purchase->save();
        return redirect('Purchases');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
        return view("Purchases.edit")->with('purchase',$purchase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'resource_name'  => 'required',
            'purchase_date'  => 'required',
            'cost' => 'required',
            'comment'  => 'required',
            'officer' => 'required'
        ]);

        $purchase = Purchase::find($id);
        $purchase->resource_name = $request->get('resource_name');
        $purchase->purchase_date = $request->get('purchase_date');
        $purchase->cost = $request->get('cost');
        $purchase->comment = $request->get('comment');
        $purchase->officer = $request->get('officer');
        $purchase->save();

        return redirect('Purchases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purchase::destroy($id);
        return redirect('Purchases');
    }
}
