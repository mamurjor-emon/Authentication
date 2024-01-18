<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class ScheduleController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Schedule');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Schedule'] = 'active';
            $data['breadcrumb'] = ['Schedule' => '',];
            return view('backend.pages.schedule.index', $data);
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
                $getData = Schedule::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('title', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('icon', function ($data) {
                        return $data->icon;
                    })
                    ->addColumn('target', function ($data) {
                        return target($data->target);
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.schedule.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.schedule.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['target', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Schedule');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Schedule'] = 'active';
            $data['totalSchedule'] = Schedule::get();
            $data['breadcrumb'] = ['Schedule' => route('admin.schedule.index'), 'Create Schedule' => '',];
            return view('backend.pages.schedule.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(ScheduleRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            Schedule::create([
                'icon'        => $request->icon,
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'discription' => $request->description,
                'btn_title'   => $request->btn_title,
                'url'         => $request->url,
                'target'      => $request->target,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.schedule.index')->with('success', 'Schedule Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Schedule');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Schedule'] = 'active';
            $data['breadcrumb'] = ['Schedule' => route('admin.schedule.index'), 'Edit Schedule' => '',];
            $data['editSchedule'] = Schedule::where('id', $id)->first();
            return view('backend.pages.schedule.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(ScheduleRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editSchedule = Schedule::where('id', $request->update_id)->first();
            $editSchedule->update([
                'icon'        => $request->icon,
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'discription' => $request->description,
                'btn_title'   => $request->btn_title,
                'url'         => $request->url,
                'target'      => $request->target,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.schedule.index')->with('success', 'Schedule Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editSchedule = Schedule::where('id', $id)->first();
            $editSchedule->delete();
            return back()->with('success', 'Schedule Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
