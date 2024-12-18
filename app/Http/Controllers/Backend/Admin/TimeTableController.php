<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeTableRequest;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class TimeTableController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Time Table');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTable']              = 'active';
            $data['breadcrumb']             = ['Time Table' => '',];
            return view('backend.pages.doctors.time-table.index', $data);
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
                $getData = TimeTable::latest('id');
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
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.time-table.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.time-table.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Time');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTable']              = 'active';
            $data['totalTimes']             = TimeTable::get();
            $data['breadcrumb']             = ['Times' => route('admin.doctor.time-table.index'), 'Create Time' => '',];
            return view('backend.pages.doctors.time-table.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(TimeTableRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            TimeTable::create([
                'time'     => $request->time,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.time-table.index')->with('success', 'Time Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Time');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTable']              = 'active';
            $data['editTimeTable']          = TimeTable::find($id);
            $data['breadcrumb']             = ['Times' => route('admin.doctor.time-table.index'), 'Edit Time' => '',];
            return view('backend.pages.doctors.time-table.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(TimeTableRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editDay = TimeTable::where('id', $request->update_id)->first();
            $editDay->update([
                'time'     => $request->time,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.time-table.index')->with('success', 'Time Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editTime = TimeTable::where('id', $id)->first();
            $editTime->delete();
            return back()->with('success', 'Time Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
