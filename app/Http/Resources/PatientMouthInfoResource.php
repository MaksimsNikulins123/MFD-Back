<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientMouthInfoResource extends JsonResource
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
            'throat' => 
                [
                    'throat_1' => $this->throat_1,
                    'throat_2' => $this->throat_2,
                ],
            'tonsils' => 
                [
                    'tonsils_1' => $this->tonsils_1,
                    'tonsils_2' => $this->tonsils_2,
                ],
            'created_at' => $created_date,
        ];
    }
}
