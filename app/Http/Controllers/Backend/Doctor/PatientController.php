<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatientController extends Controller
{
    public function index(){
        if (Gate::allows('isDoctor')) {
            $this->setPageTitle('Patients');
            $data['parentPatientMenu']    = 'expanded';
            $data['parentPatientSubMenu'] = 'style="display: block;"';
            $data['activePatient']        = 'active';
            return view('backend.doctor.patient.index',$data);
        } else {
            abort(401);
        }
    }
}
