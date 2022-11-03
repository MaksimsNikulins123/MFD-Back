<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient_Main_Info extends Model
{
    use HasFactory;

    protected $fillable = 
        [
        'date_of_registration',
        'name',
        'surname',
        'personal_code',
        'complaints_and_anamnesis',
        'adjacent_deseases',
        'drug_intolerance_allergies'
        ];

    public function patientNoseInfo()
    {
        return $this->hasMany(Patient_Nose_Info::class);
    }
    public function patientMouthInfo()
    {
        return $this->hasMany(Patient_Mouth_Info::class);
    }
}
