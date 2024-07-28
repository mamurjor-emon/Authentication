<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DayRequest;
use App\Models\DayModel;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class DayController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Days');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addDay']               = 'active';
            $data['breadcrumb']           = ['Days' => '',];
            return view('backend.pages.doctors.days.index', $data);
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
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = DayModel::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('status', function ($data) {
                        return dayStatus($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.day.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.day.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Day');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addDay']               = 'active';
            $data['totalDays']            = DayModel::get();
            $data['breadcrumb']           = ['Days' => route('admin.doctor.day.index'), 'Create Day' => '',];
            return view('backend.pages.doctors.days.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(DayRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            DayModel::create([
                'name'     => $request->name,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.day.index')->with('success', 'Day Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Day');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addDay']               = 'active';
            $data['editDay']              =  DayModel::find($id);
            $data['breadcrumb']           = ['Days' => route('admin.doctor.day.index'), 'Edit Day' => '',];
            return view('backend.pages.doctors.days.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(DayRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editDay = DayModel::where('id', $request->update_id)->first();
            $editDay->update([
                'name'     => $request->name,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.day.index')->with('success', 'Day Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editDay = DayModel::where('id', $id)->first();
            $editDay->delete();
            return back()->with('success', 'Day Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}

