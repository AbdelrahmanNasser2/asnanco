<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Visit;
use Excel;
use  App\Exports\PatientExport;
use App\Exports\VisitExport;
class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Patients.create');
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
            'name'              => 'required',
            'phone'             => 'required | numeric',
            'address'           => 'required',
            'general_diagnosis' => 'required',
            'job'               => 'required',
            'other_diseases'    => 'required'
        ]);

        $patient = new Patient();

        $patient->name = $request->get('name');
        $patient->phone = $request->get('phone');
        $patient->address = $request->get('address');
        $patient->general_diagnosis = $request->get('general_diagnosis');
        $patient->job = $request->get('job');
        $patient->other_diseases = $request->get('other_diseases');
        $patient->created_by = session('username');
        $patient->save();

        $patient_id = $patient->id;

        return redirect()->route('Visits.create' , $patient_id)->with('success', 'تم إضافة المريض');

    }

    public function fetch(Request $request){
        if($request->get('query')){
            $query = $request->get('query');

            $data = Patient::where('name' , 'LIKE' , '%'.$query.'%')->orWhere('phone' , 'LIKE' , '%'.$query.'%')->get();
            $output = '';

            if($data){
                $output = '<ul class="dropdown-menu col-md-12" style="display:block; position:relative">';
                foreach ($data as $row) {
                    $output .= '<li><a href="'.action("PatientsController@show", $row->id).'" class="btn btn-default col-md-12">'.$row->name.'</a></li>';
                }
                $output .= '</ul>';
            }

            echo $output;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $visits = Visit::where('patient_id' , $id)->get();

        return view('Patients.show', compact('patient' , 'visits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('Patients.edit', compact('patient'));
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
            'name'              => 'required',
            'phone'             => 'required | numeric',
            'address'           => 'required',
            'general_diagnosis' => 'required',
            'job'               => 'required',
            'other_diseases'    => 'required'
        ]);

        $patient = Patient::find($id);

        $patient->name = $request->get('name');
        $patient->phone = $request->get('phone');
        $patient->address = $request->get('address');
        $patient->general_diagnosis = $request->get('general_diagnosis');
        $patient->job = $request->get('job');
        $patient->other_diseases = $request->get('other_diseases');

        $patient->save();

        return redirect('Patients/'. $id)->with('success', 'تم التعديل');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Visit::where('patient_id' , $id)->delete();

        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->route('Patients.index')->with('success','تم الحذف');
    }


    public function createVisit($patient_id){

        return view('Visits.create', compact('patient_id'));

    }

    public function storeVisit(Request $request){

        $this->validate($request, [
            'drname'     => 'required',
            'visit_date' => 'required | date',
            'paid'       => 'required | numeric',
            'remain'     => 'required | numeric',
            'comment'    => 'required'
        ]);

        $visit = new Visit();

        $visit->dr_name = $request->get('drname');
        $visit->visit_date = $request->get('visit_date');
        $visit->paid = $request->get('paid');
        $visit->remain = $request->get('remain');
        $visit->comment = $request->get('comment');
        $visit->patient_id = $request->get('patient_id');
        $visit->created_by = session('username');
        $visit->visit_type = $request->get('selection');
        $visit->save();

        return redirect('Patients/'. $request->get('patient_id'))->with('success', 'تم إضافة الزياره');

    }

    public function deleteVisit($id){
        $visit = Visit::find($id);
        $patient_id = $visit->patient_id;
        $visit->delete();

        return redirect('Patients/'. $patient_id)->with('success', 'تم الحذف');
    }

    public function editVisit($id){

        $visit = Visit::find($id);

        return view('Visits.edit', compact('visit'));
    }

    public function updateVisit(Request $request, $id){

        $this->validate($request, [
            'drname'     => 'required',
            'visit_date' => 'required | date',
            'paid'       => 'required | numeric',
            'remain'     => 'required | numeric',
            'comment'    => 'required'
        ]);

        $visit = Visit::find($id);

        $patient_id = $visit->patient_id;

        $visit->dr_name = $request->get('drname');
        $visit->visit_date = $request->get('visit_date');
        $visit->paid = $request->get('paid');
        $visit->remain = $request->get('remain');
        $visit->comment = $request->get('comment');

        $visit->save();

        return redirect('Patients/'. $patient_id)->with('success', 'تم التعديل');

    }

    public function excel(Request $req,$id)
    {
        $from = $req->get('from');
        $to   = $req->get('to');
        if($from == '' and $to == ''){

        }elseif ($from == '') {
           $from = '0000-01-01';
        }elseif ($to == '') {
            $to = '9999-01-01';
        }
        return Excel::download(new PatientExport($from,$to),'patients.xlsx');
    }

     public function excel1(Request $req,$id)
    {
        $from = $req->get('from');
        $to   = $req->get('to');
        
        if($from == '' and $to == ''){

        }elseif ($from == '') {
           $from = '0000-01-01';
        }elseif ($to == '') {
            $to = '9999-01-01';
        }
        
        return Excel::download(new VisitExport($from,$to),'visits.xlsx');
    }

   
}
