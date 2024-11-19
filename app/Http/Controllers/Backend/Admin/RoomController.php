<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Rooms');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addRoom']                = 'active';
            $data['breadcrumb']             = ['Rooms' => '',];
            return view('backend.pages.doctors.room.index', $data);
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
                $getData = Room::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('room_no', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('room_no', function ($data) {
                        return $data->room_no;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.room.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.room.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Rooom');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addRoom']                = 'active';
            $data['totalRooms']             = Room::get();
            $data['breadcrumb']             = ['Rooms' => route('admin.doctor.room.index'), 'Create Rooom' => '',];
            return view('backend.pages.doctors.room.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(RoomRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            Room::create([
                'room_no'  => $request->room_no,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.room.index')->with('success', 'Room Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Room');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addRoom']                = 'active';
            $data['editRoom']               = Room::find($id);
            $data['breadcrumb']             = ['Rooms' => route('admin.doctor.room.index'), 'Edit Room' => '',];
            return view('backend.pages.doctors.room.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(RoomRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editRoom = Room::find($request->update_id);
            $editRoom->update([
                'room_no'  => $request->room_no,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.room.index')->with('success', 'Room Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editRoom = Room::find($id);
            $editRoom->delete();
            return back()->with('success', 'Room Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
