<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\PatientController;
// use App\Http\Controllers\Api\PatientListController;
use App\Models\Patient;

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});

Route::apiResources([
   'patients' => PatientController::class
]);
// Route::get('/patients', [PatientController::class, 'index'] );
// Route::get('/patients/{id}', [PatientController::class, 'show'] );
// Route::get('/patients', [PatientListController::class, 'index'] );

// Route::get('/patients', [PatientListController::class, 'index']);

// Route::apiResources([
//    'patients' => PatientListController::class
// ]);
// Route::get('/patients/{personal_code}', [PatientController::class, 'find'] );

// Route::post('/add_patient', [PatientController::class, 'store'] );
// Route::post('/add_patient', [PatientListController::class, 'store'] );

