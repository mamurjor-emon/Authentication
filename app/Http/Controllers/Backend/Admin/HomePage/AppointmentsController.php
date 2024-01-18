<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Gate;

class AppointmentsController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Appointment Section');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['appointmentActive'] = 'active';
            $data['breadcrumb'] = ['Appointment Section' => '',];
            $data['appointmentData'] = Appointment::first();
            return view('backend.pages.appointment.index', $data);
        } else {
            abort(401);
        }
    }
    public function createOrUpdate(AppointmentRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->update_id != null) {
                $editAppointment = Appointment::where('id', $request->update_id)->first();
                if ($editAppointment->image != null) {
                    if ($request->file('image')) {
                        $image = $this->imageUpdate($request->file('image'), 'images/appointment/', null, null, $editAppointment->image);
                    } else {
                        $image = $editAppointment->image;
                    }
                }
            } else {
                if ($request->file('image')) {
                    $image = $this->imageUpload($request->file('image'), 'images/appointment/', null, null);
                } else {
                    $image = null;
                }
            }
            Appointment::updateOrCreate(['id' => $request->update_id], [
                'image'      => $image,
                'btn_title'  => $request->btn_title,
                'title'      => $request->title,
                'status'     => $request->status,
            ]);
            return back()->with('success', 'AppointMent Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }
}
