<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMainInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $created_date = date_format($this->created_at, 'd.m.Y');
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'personal_code' => $this->personal_code,
            'complaints_and_anamnesis' => $this->complaints_and_anamnesis,
            'adjacent_deseases' => $this->adjacent_deseases,
            'drug_intolerance_allergies' => $this->drug_intolerance_allergies,
            'created_at' => $created_date,
            'patientNoseInfo' => PatientNoseInfoResource::collection($this->patientNoseInfo),
            'patientMouthInfo' => PatientMouthInfoResource::collection($this->patientMouthInfo),
        ];
    }
}
