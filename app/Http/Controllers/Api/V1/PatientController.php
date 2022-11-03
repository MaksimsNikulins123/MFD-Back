<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient_Main_Info;
use App\Http\Resources\PatientMainInfoResource;
use App\Http\Requests\PatientStoreRequest;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return PatientMainInfoResource::collection(Patient_Main_Info::with('patientNoseInfo', 'patientMouthInfo')->get());
        return PatientMainInfoResource::collection(Patient_Main_Info::all());
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientStoreRequest $request)
    {
        $created_patient = Patient_Main_Info::create($request->validated());

        return new PatientMainInfoResource($created_patient);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(Patient_Main_Info $patient)
    {
        
        // return new PatientMainInfoResource(Patient_Main_Info::findOrFail($id));
        return new PatientMainInfoResource($patient);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientStoreRequest $request, Patient_Main_Info $patient)
    {
        $patient->update($request->validated());
        // $patient->update($request->input());
        // $patient->update($request->input('name'));
        
        return new PatientMainInfoResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Patient_Main_Info $patient)
    {
       $patient->delete();

    //    return response(null, Response::HTTP_NO_CONTENT);
    return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
