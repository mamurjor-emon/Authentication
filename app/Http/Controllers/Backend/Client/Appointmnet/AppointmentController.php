<?php

namespace App\Http\Controllers\Backend\Client\Appointmnet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{
   public function index(){
    if (Gate::allows('isClient')) {
        $this->setPageTitle('Appointments');
        $data['parentAppointmentMenu']    = 'expanded';
        $data['parentAppointmentSubMenu'] = 'style="display: block;"';
        $data['Appointments']             = 'active';
        $data['breadcrumb']               = ['Appointments' => '',];
        return view('backend.client.appointment.index', $data);
    } else {
        abort(401);
    }
   }

   public function view(){
    if (Gate::allows('isClient')) {
        $this->setPageTitle('Appointment View');
        $data['parentAppointmentMenu']    = 'expanded';
        $data['parentAppointmentSubMenu'] = 'style="display: block;"';
        $data['Appointments']             = 'active';
        $data['breadcrumb']               = ['Appointments' => route('client.appontment.index'), 'Appointment View' => ''];
        return view('backend.client.appointment.view', $data);
    } else {
        abort(401);
    }
   }
}
