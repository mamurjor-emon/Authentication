<?php

namespace App\Http\Controllers\Backend\Doctor;

use Illuminate\Http\Request;
use App\Models\PatientAppontment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PatientController extends Controller
{
    public function index()
    {
        if (Gate::allows('isDoctor')) {
            $this->setPageTitle('Patients');
            $data['parentPatientMenu']    = 'expanded';
            $data['parentPatientSubMenu'] = 'style="display: block;"';
            $data['activePatient']        = 'active';
            return view('backend.doctor.patient.index', $data);
        } else {
            abort(401);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        if (Gate::allows('isDoctor')) {
            if ($request->ajax()) {
                $getData = PatientAppontment::with(['user', 'doctor','slot'])->where('doctor_id', Auth::id())->latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('fname', 'like', "%{$value}%")
                                    ->orWhere('lname', 'like', "%{$value}%")
                                    ->orWhere('email', 'like', "%{$value}%")
                                    ->orWhere('phone', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('full_name', function ($data) {
                        return $data->user->fname . ' ' . $data->user->lname;
                    })
                    ->addColumn('email', function ($data) {
                        return $data->user->email ?? '--';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->user->phone ?? '---------';
                    })
                    ->addColumn('date', function ($data) {
                        return $data->date;
                    })
                    ->addColumn('slot', function ($data) {
                        return $data->slot->start_time.' '.$data->slot->start_zone.' - '.$data->slot->end_time.' '.$data->slot->end_zone;
                    })
                    ->addColumn('image', function ($data) {
                        if ($data->user->avatar) {
                            return '<img id="getDataImage" src="' . asset($data->user->avatar ?? '') . '" alt="image">';
                        } else {
                            return '<img id="getDataImage" src="' . asset('common/5907-removebg-preview.png') . '" alt="image">';
                        }
                    })
                    ->addColumn('status', function ($data) {
                        return appointStatus($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="btn-group dropleft">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropleft
                            </button>
                            <div class="dropdown-menu">
                               <div class="btn-group dropleft">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropleft
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                </div>
                                </div>
                            </div>
                            </div>';
                    })
                    ->rawColumns(['slot','image', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }
}
