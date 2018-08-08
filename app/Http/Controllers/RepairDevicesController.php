<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair_Device;

class RepairDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairDevices = Repair_Device::all()->toArray();

        if($repairDevices)
            $repairDevice = array($repairDevices[sizeof($repairDevices)-1]);
        else
            $repairDevice = array();

        return view('RepairDevices.index', compact('repairDevice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RepairDevices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'companyName' => 'required',
            'appearienceDate' => 'required | date',
            'callDate' => 'required | date',
            'visitDate' => 'required | date',
            'callerName' => 'required',
            'cost' => 'required | numeric'
        ]);

        $repairDevice = new Repair_Device([
            'company_name' => $request->get('companyName'),
            'appearience_date' => $request->get('appearienceDate'),
            'call_date' => $request->get('callDate'),
            'visit_date' => $request->get('visitDate'),
            'caller_name' => $request->get('callerName'),
            'cost' => $request->get('cost'),
            'comment' => $request->get('comment')
        ]);

        $repairDevice->save();

        return redirect()->route('RepairDevices.index')->with('success', 'تم إضافة الفاتورة');
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
        $repairDevice = Repair_Device::find($id);

        return view('RepairDevices.edit', compact('repairDevice'));
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
        $this->validate($request , [
            'companyName' => 'required',
            'appearienceDate' => 'required | date',
            'callDate' => 'required | date',
            'visitDate' => 'required | date',
            'callerName' => 'required',
            'cost' => 'required | numeric'
        ]);

        $repairDevice = Repair_Device::find($id);

        $repairDevice->company_name = $request->get('companyName');
        $repairDevice->appearience_date = $request->get('appearienceDate');
        $repairDevice->call_date = $request->get('callDate');
        $repairDevice->visit_date = $request->get('visitDate');
        $repairDevice->caller_name = $request->get('callerName');
        $repairDevice->cost = $request->get('cost');
        $repairDevice->comment = $request->get('comment');

        $repairDevice->save();

        return redirect()->route('RepairDevices.index')->with('success', 'تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repairDevice = Repair_Device::find($id);
        $repairDevice->delete();

        return redirect()->route('RepairDevices.index')->with('success','تم الحذف');
    }
}