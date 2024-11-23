<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\User;
use App\Models\Roles;
use App\Mail\NewDoctorMail;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Events\NotificationBroadcast;
use App\Models\Bullding;
use App\Models\Room;
use App\Notifications\DoctorRegisterNotification;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Doctor Section');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['addDoctor']              = 'active';
            $data['breadcrumb']             = ['Doctors' => '',];
            return view('backend.pages.doctors.doctor.index', $data);
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
                $getData = DoctorModel::with(['user', 'department', 'room', 'bullding'])->latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $search = $request->search;
                            $query->where(function ($query) use ($search) {
                                $query->whereHas('user', function ($query) use ($search) {
                                    $query->where('fname', 'like', "%{$search}%")
                                        ->orWhere('lname', 'like', "%{$search}%")
                                        ->orWhere('email', 'like', "%{$search}%");
                                })
                                    ->orWhereHas('department', function ($query) use ($search) {
                                        $query->where('name', 'like', "%{$search}%");
                                    })
                                    ->orWhereHas('room', function ($query) use ($search) {
                                        $query->where('room_no', 'like', "%{$search}%");
                                    })
                                    ->orWhereHas('bullding', function ($query) use ($search) {
                                        $query->where('name', 'like', "%{$search}%")
                                            ->OrWhere('location', 'like', "%{$search}%");
                                    });
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->user ? $data->user->fname : '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->user ? $data->user->email : '--';
                    })
                    ->addColumn('department', function ($data) {
                        return $data->department ? $data->department->name : '--';
                    })
                    ->addColumn('bullding', function ($data) {
                        return $data->bullding ? $data->bullding->name : '--';
                    })
                    ->addColumn('room', function ($data) {
                        return $data->room ? $data->room->room_no : '--';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ? $data->phone : '--';
                    })
                    ->addColumn('image', function ($data) {
                        return '<img class="bg-dark" id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                    })
                    ->addColumn('position', function ($data) {
                        return $data->position ? $data->position : '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        if ($data->status == 1) {
                            return '<div class="text-right" ><a href="' . route('admin.doctor.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                            <i class="material-icons mdc-button__icon">colorize</i>
                            </a> <a href="' . route('frontend.single.doctors', ['id' => $data->id]) . '" class="mdc-button mdc-button--raised icon-button mdc-ripple-upgraded">
                            <i class="material-icons mdc-button__icon">visibility</i>
                            </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                            <i class="material-icons mdc-button__icon">delete</i>
                            </button><form action="' . route('admin.doctor.delete', ['id' => $data->id]) . '"
                            id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                            @csrf
                            @method("DELETE") </form></div>';
                        } else {
                            return '<div class="text-right">
                            </a> <a href="' . route('admin.doctor.edit', ['id' => $data->id]) . '" class="mdc-button mdc-button--raised icon-button mdc-ripple-upgraded filled-button--success">
                            <i class="material-icons mdc-button__icon">colorize</i>
                            </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                            <i class="material-icons mdc-button__icon">delete</i>
                            </button><form action="' . route('admin.doctor.delete', ['id' => $data->id]) . '"
                            id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                            @csrf
                            @method("DELETE") </form></div>';
                        }
                    })
                    ->rawColumns(['image', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Doctor');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['addDoctor']              = 'active';
            $data['breadcrumb']             = ['Doctors' => route('admin.doctor.index'), 'Create Doctor' => '',];
            $data['allActiveClients']       = User::where('role_id', 3)->where('status', '1')->get();
            $data['allDepartments']         = DepartmentModel::where('status', '1')->get();
            $data['allBulldings']           = Bullding::where('status', '1')->get();
            return view('backend.pages.doctors.doctor.create', $data);
        } else {
            abort(401);
        }
    }

    public function getRoom(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getUseRoom = DoctorModel::where('bullding_id', $request->id)->pluck('room_id')->toArray();
                $getRooms = Room::where('bullding_id', $request->id)->get();
                $responRoom = '<option value="">Select Room</option>';
                if ($getRooms->isNotEmpty()) {
                    foreach ($getRooms as $room) {
                        if (in_array($room->id, $getUseRoom)) {
                            continue;
                        } else {
                            $responRoom .= '<option value="' . $room->id . '">'. 'Room No : ' . $room->room_no . '</option>';
                        }
                    }
                }
                return response()->json([
                    'status' => 'success',
                    'data'   => $responRoom
                ]);
            }
        } else {
            abort(401);
        }
    }


    public function store(DoctorRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/doctors/', null, null);
            } else {
                $image = null;
            }
            DoctorModel::create([
                'user_id'       => $request->user_id,
                'department_id' => $request->department_id,
                'room_id'       => $request->room_id,
                'bullding_id'   => $request->bullding_id,
                'image'         => $image,
                'phone'         => $request->phone,
                'location'      => $request->location,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'vimo'          => $request->vimo,
                'pinterest'     => $request->pinterest,
                'position'      => $request->position,
                'fdegree'       => $request->fdegree,
                'sdegree'       => $request->sdegree,
                'tdegree'       => $request->tdegree,
                'ldegree'       => $request->ldegree,
                'workday'       => $request->workday,
                'fbiography'    => $request->fbiography,
                'education'     => $request->education,
                'lbiography'    => $request->lbiography,
                'status'        => $request->status,
            ]);
            $user = User::where('id', $request->user_id)->first();
            $role = Roles::where('slug', 'doctor')->first();
            $user->update([
                'email_verified_at' => now(),
                'role_id'           => $role->id,
            ]);
            $request['full_name']    = $user->fname . ' ' . $user->lname;
            $request['button_title'] = 'Click To Dashboard';
            $request['button_url']   = route('doctor.dashboard');
            // New Doctor Mail
            $subject = emailSubjectTemplate('NEW_DOCTOR_MAIL', $request);
            $body    = emailBodyTemplate('NEW_DOCTOR_MAIL', $request);
            $heading = emailHeadingTemplate('NEW_DOCTOR_MAIL', $request);

            $userMail = ['subject' => $subject, 'body' => $body, 'heading' => $heading];
            Mail::to($request->email)->later(now()->addSeconds(10), new NewDoctorMail($userMail));
            return redirect()->route('admin.doctor.index')->with('success', 'Doctor Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Doctor');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['addDoctor']              = 'active';
            $data['breadcrumb']             = ['Doctors' => route('admin.doctor.index'), 'Edit Doctor' => '',];
            $data['editDoctor']             = DoctorModel::where('id', $id)->first();
            $data['allActiveClients']       = User::where('role_id', 3)->where('status', '1')->get();
            $data['allDepartments']         = DepartmentModel::where('status', '1')->get();
            $data['allBulldings']           = Bullding::where('status', '1')->get();
            $getUseRoom = DoctorModel::where('bullding_id', $data['editDoctor']->bullding_id)->pluck('room_id')->toArray();
            $getRooms = Room::where('bullding_id', $data['editDoctor']->bullding_id)->get();
            $responRoom = '<option value="">Select Room</option>';
            if ($getRooms->isNotEmpty()) {
                foreach ($getRooms as $room) {
                    if (in_array($room->id, $getUseRoom)) {
                    }if($room->id === $data['editDoctor']->room_id){
                        dd($data['editDoctor']->room_id);
                        $responRoom .= '<option value="' . $room->id . '" selected>'. 'Room No : ' . $room->room_no . '</option>';
                    } else {
                        $responRoom .= '<option value="' . $room->id . '">'. 'Room No : ' . $room->room_no . '</option>';
                    }
                }
            }
            $data['editResponRoom'] = $responRoom;
            return view('backend.pages.doctors.doctor.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(DoctorRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editDoctor = DoctorModel::where('id', $request->update_id)->first();
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/doctors/', null, null, $editDoctor->image);
            } else {
                $image = $editDoctor->image;
            }
            $editDoctor->update([
                'department_id' => $request->department_id,
                'image'         => $image,
                'phone'         => $request->phone,
                'location'      => $request->location,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'vimo'          => $request->vimo,
                'pinterest'     => $request->pinterest,
                'position'      => $request->position,
                'fdegree'       => $request->fdegree,
                'sdegree'       => $request->sdegree,
                'tdegree'       => $request->tdegree,
                'ldegree'       => $request->ldegree,
                'workday'       => $request->workday,
                'fbiography'    => $request->fbiography,
                'education'     => $request->education,
                'lbiography'    => $request->lbiography,
                'status'        => $request->status,
            ]);
            return redirect()->route('admin.doctor.index')->with('success', 'Doctor Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editDoctor = DoctorModel::where('id', $id)->first();
            $this->imageDelete($editDoctor->image);
            $editDoctor->delete();
            return back()->with('success', 'Doctor Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
