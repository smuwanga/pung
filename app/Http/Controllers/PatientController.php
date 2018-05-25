<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Facility;
use Log;


class PatientController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patient::orderBy('id','DESC')->paginate(5);
        return view('patients.index',compact('patients'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts_array = json_decode(Facility::distinct()->get(['district'])) ;
        
       
        $districts = array();
        $subCounties = array();
        $subCountyFacilities = array();
        array_push($districts, "---");
        foreach ($districts_array as $key => $value) {
            
            array_push($districts, $value->district);
           
        }
        
        return view('patients.create',compact('districts','subCounties','subCountyFacilities'));
    }

    public function getSubCounties($selected_district){
        
        $sql = "select DISTINCT sub_county from facilities where district like '$selected_district' order by sub_county asc";
        $subcounties_array = \DB::connection('mysql')->select($sql);

        $subcounties = array();
        array_push($subcounties, "----");
        foreach ($subcounties_array as $key => $value) {
            
            array_push($subcounties, $value->sub_county);
           
        }
        return $subcounties;
    }

    public function getSubCountyFacilities($district,$selected_subcounty){
        $sql = "select id, name,nhpi_code from facilities where district like '$district'  and  sub_county like '$selected_subcounty' order by name asc";
        $facilities_array = \DB::connection('mysql')->select($sql);

       
        $facilities = array();
        array_push($facilities, "----");
        foreach ($facilities_array as $key => $value) {
            $facilities["$value->nhpi_code"]=$value->name;
            //array_push($facilities, $value->name);
           
        }
        return $facilities;
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
            'name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'art_number' => 'required',
            'district' => 'required',
            'sub_county' => 'required',
            'health_facility' => 'required',
            'patient_unique_number' => 'required',
        ]);


        Patient::create($request->all());


        return redirect()->route('patients.index')
                        ->with('success','Patient created successfully');
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
        return view('patients.show',compact('patient'));
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
        return view('patients.edit',compact('patient'));
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
            'name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
        ]);


        Patient::find($id)->update($request->all());


        return redirect()->route('patients.index')
                        ->with('success','Patient updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patients.index')
                        ->with('success','Patient deleted successfully');
    }
}
