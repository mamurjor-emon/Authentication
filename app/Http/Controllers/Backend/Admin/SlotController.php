<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlotRequest;
use App\Models\SlotModel;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class SlotController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Slots');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addSlot']              = 'active';
            $data['breadcrumb']           = ['Slots' => '',];
            return view('backend.pages.doctors.slots.index', $data);
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
                $getData = SlotModel::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('start_time', 'like', "%{$value}%")
                                    ->orWhere('end_time', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('start_time', function ($data) {
                        return $data->start_time;
                    })
                    ->addColumn('end_time', function ($data) {
                        return $data->end_time;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.slot.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.slot.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Slot');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addSlot']              = 'active';
            $data['totalSlots']           = SlotModel::get();
            $data['breadcrumb']           = ['Days' => route('admin.doctor.slot.index'), 'Create Slot' => '',];
            return view('backend.pages.doctors.slots.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(SlotRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            dd($request->all());
            SlotModel::create([
                'start_time' => $request->start_time,
                'end_time'   => $request->end_time,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.doctor.slot.index')->with('success', 'Slot Create Successfuly Done..!');
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
