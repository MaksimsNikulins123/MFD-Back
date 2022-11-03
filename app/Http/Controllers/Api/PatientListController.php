<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;
use App\Http\Resources\PatientResource;

class PatientListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return (['message'=>'Product Created Successfully!!']);
        // return PatientResource::collection(Patient::all());
       $patients = Patient::getAllPatients();
        return response()->json($patients);
        // return 'Sending data from Laravel';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $created_new_patient = Patient::create($request->all());

        // return new PatienResource($created_new_patient);

        $patient = new Patient();
        $patient->date = $request->get('date');
        $patient->name = $request->get('name');
        $patient->surname = $request->get('surname');
        $patient->personas_kods = $request->get('personas_kods');
        $patient->sudzibas_un_anamneze = $request->get('sudzibas_un_anamneze');
        $patient->blakus_slimibas = $request->get('blakus_slimibas');
        $patient->medikamentu_nepanesamība_alergijas = $request->get('medikamentu_nepanesamība_alergijas');
        $patient->areja_forma = $request->get('areja_forma');
        $patient->glotada1 = $request->get('glotada1');
        $patient->glotada2 = $request->get('glotada2');
        $patient->deguna_ejas = $request->get('deguna_ejas');
        $patient->atdalijumi = $request->get('atdalijumi');
        $patient->atdalijumu_veidi = $request->get('atdalijumu_veidi');
        $patient->deguna_starpsiena = $request->get('deguna_starpsiena');
        $patient->elposana_caur_degunu = $request->get('elposana_caur_degunu');
        $patient->rikle1 = $request->get('rikle1');
        $patient->rikle2 = $request->get('rikle2');
        $patient->mandeles1 = $request->get('mandeles1');
        $patient->mandeles2 = $request->get('mandeles2');

        $patient->save();
        // return $patient;

        return response()->json([
            'status' => 200,
            'message' => 'Patient added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Patient::find($id);
        return new PatientResource(Patient::findOrFail($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
