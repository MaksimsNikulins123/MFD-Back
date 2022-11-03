<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientNoseInfoResource extends JsonResource
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
            'external_form' => $this->external_form,
            'mucous_membrane' => 
                [
                'mucous_membrane_1' =>$this->mucous_membrane_1,
                'mucous_membrane_2' => $this->mucous_membrane_2,
                ],
            'nasal_passages' => $this->nasal_passages,
            'separations' => $this->separations,
            'nasal_septum' => $this->nasal_septum,
            'breathing_through_the_nose' => $this->breathing_through_the_nose,
            'created_at' => $created_date,
        ];
    }
}
