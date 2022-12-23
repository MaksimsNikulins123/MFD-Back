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
        $patients = PatientMainInfoResource::collection(Patient_Main_Info::all());// return PatientMainInfoResource::collection(Patient_Main_Info::with('patientNoseInfo', 'patientMouthInfo')->get());
        // $object = $patients->data;
        // return $object;
        return count($patients) ;
        // $array_lenght = strlen( $patients->data);
        // return $array_lenght;
        // return PatientMainInfoResource::collection(Patient_Main_Info::all());
    }
   // new one
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
        // $code = $patient;
        // $code = $patient;
        $response = 'show patients';
        // return new PatientMainInfoResource(Patient_Main_Info::findOrFail($patient));
        // return PatientMainInfoResource::collection(Patient_Main_Info::with('patientNoseInfo', 'patientMouthInfo')->get($id));
        // return new PatientMainInfoResource($patient);
        // return $patient;
       
    }
    public function find(Request $request)
    {
     
        $search_value = $request->personal_code;
        $search_lenght = strlen($search_value);
        $page_number = $request->page_number;
        $users_count_on_page = $request->users_count_on_page;

        $patients = PatientMainInfoResource::collection(Patient_Main_Info::all());
        $found_users = [];
        $found_users_count = 0;

        // $users_array_for_pagination = array_chunk($patients, $users_count_on_page);
        // for ($i=0; $i < 5; $i++) { 

        //     if(str_starts_with($patients[i]->personal_code, $search_value))
        //     {
            
        //         array_push($personal_codes, $patients[i]);
        //     }
        //     continue;
        // }

        foreach ($patients as $patient)
        {
            if(str_starts_with($patient->personal_code, $search_value))
            {
                // if(count($personal_codes) <= 4)
                // {
                    array_push($found_users, $patient);
                    $found_users_count++;
                // }
                // else
                // {
                //     $total_count++;
                // }
            }
            continue;
            
        }

        if(count($found_users) > 0)
        {
            $users_array_for_pagination = array_chunk($found_users, $users_count_on_page);
            $current_part_of_users_array_for_pagination = $users_array_for_pagination[$page_number-1];
        }
        else
        {
            $current_part_of_users_array_for_pagination = [];
            // $found_users_count++;
        }
       

        $response = (object) [
            // 'data' => $found_users,
            // 'data' => $users_array_for_pagination,
            'data' => $current_part_of_users_array_for_pagination,
            // 'data' => $patients,
            'foundUsersCount' => $found_users_count 
          ];
        
        // $response = $patients[0]->personal_code;
        
        return $response; 
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
