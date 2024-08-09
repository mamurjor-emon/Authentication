<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\DayModel;
use App\Models\TimeTable;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\TimePageModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\TimePageRequest;
use Yajra\DataTables\Facades\DataTables;

class TimePageController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Time Table Page Setting');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTablePage']          = 'active';
            $data['breadcrumb']             = ['Time Table Page Setting' => '',];
            return view('backend.pages.doctors.time-table-page.index', $data);
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
                $getData = TimePageModel::with(['user', 'time', 'day'])->latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('status', 'like', "%{$value}%");

                                $query->orWhereHas('user', function ($q) use ($value) {
                                    $q->where('fname', 'like', "%{$value}%")
                                        ->orWhere('lname', 'like', "%{$value}%")
                                        ->orWhere('email', 'like', "%{$value}%");
                                });
                                $query->orWhereHas('time', function ($q) use ($value) {
                                    $q->where('time', 'time', "%{$value}%");
                                });
                                $query->orWhereHas('day', function ($q) use ($value) {
                                    $q->where('name', 'like', "%{$value}%");
                                });
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('user_name', function ($data) {
                        return $data->user->fname . '-' . $data->user->fname;
                    })
                    ->addColumn('email', function ($data) {
                        return $data->user->email ?? '';
                    })
                    ->addColumn('avatar', function ($data) {
                        if ($data->user->avatar) {
                            return '<img id="getDataImage" src="' . asset($data->user->avatar ?? '') . '" alt="image">';
                        } else {
                            return '<img id="getDataImage" src="' . asset('common/5907-removebg-preview.png') . '" alt="image">';
                        }
                    })
                    ->addColumn('day', function ($data) {
                        return $data->day->name;
                    })
                    ->addColumn('time', function ($data) {
                        return $data->time->time;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.time-page.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.time-page.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['avatar', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Time Table Page');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTablePage']          = 'active';
            $data['doctors']                = DoctorModel::with('user')->where('status', '1')->get();
            $data['days']                   = DayModel::where('status', '1')->get();
            $data['breadcrumb']             = ['Time Table Pages' => route('admin.doctor.time-page.index'), 'Create Time Table Page' => '',];
            return view('backend.pages.doctors.time-table-page.create', $data);
        } else {
            abort(401);
        }
    }

    public function getTime(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                if ($request->user_id && $request->day_id) {
                    $checkDayIds = TimePageModel::where('day_id', $request->day_id)->pluck('time_id')->toArray();
                    if (count($checkDayIds) == 0) {
                        $activeTimes = TimeTable::where('status', '1')->get();
                        $options = '<option value="">Select Time</option>';
                        if ($activeTimes) {
                            foreach ($activeTimes as $time) {
                                $options .= '<option value="' . $time->id . '">' . $time->time . '</option>';
                            }
                        }
                        return response()->json([
                            'status' => 'success',
                            'data' => $options,
                        ], 200);
                    } else {
                        $activeTimes = TimeTable::whereNotIn('id', $checkDayIds)->where('status', '1')->get();
                        $options = '<option value="">Select Time</option>';
                        if ($activeTimes) {
                            foreach ($activeTimes as $time) {
                                $options .= '<option value="' . $time->id . '">' . $time->time . '</option>';
                            }
                        }
                        return response()->json([
                            'status' => 'success',
                            'data' => $options,
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Select User Or Day !',
                    ], 200);
                }
            }
        } else {
            abort(401);
        }
    }



    public function store(TimePageRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            TimePageModel::create([
                'user_id' => $request->user_id,
                'day_id'  => $request->day_id,
                'time_id' => $request->time,
                'status'  => $request->status,
            ]);
            return redirect()->route('admin.doctor.time-page.index')->with('success', 'Time Page Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Time Table Page');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['timeTablePage']          = 'active';
            $data['doctors']                = DoctorModel::with('user')->where('status', '1')->get();
            $data['days']                   = DayModel::where('status', '1')->get();
            $data['editTimePage']           = TimePageModel::find($id);
            $data['checkDayIds']            = TimePageModel::where('day_id', $data['editTimePage']->day_id)->pluck('time_id')->toArray();
            $data['checkDayIds']            = array_filter($data['checkDayIds'], function ($value) use ($data) {
                return $value != $data['editTimePage']->time_id;
            });
            $data['activeTimes'] = TimeTable::whereNotIn('id', $data['checkDayIds'])->where('status', '1')->get();
            $data['breadcrumb']  = ['Time Table Pages' => route('admin.doctor.time-page.index'),'Edit Time Table Page' => '',];
            return view('backend.pages.doctors.time-table-page.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(TimePageRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editTimePage = TimePageModel::where('id', $request->update_id)->first();
            $editTimePage->update([
                'user_id' => $request->user_id,
                'day_id'  => $request->day_id,
                'time_id' => $request->time,
                'status'  => $request->status,
            ]);
            return redirect()->route('admin.doctor.time-page.index')->with('success', 'Time Table Page Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editTime = TimePageModel::where('id', $id)->first();
            $editTime->delete();
            return back()->with('success', 'Time Table Page Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
