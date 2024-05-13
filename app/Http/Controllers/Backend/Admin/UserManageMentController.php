<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Review;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class UserManageMentController extends Controller
{
    public function admins()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Admins');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allAdmins']               = 'active';
            $data['breadcrumb']              = ['All Admins' => '',];
            return view('backend.pages.users.admins', $data);
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
                $getData = User::with('role')->where('role_id', 1)->where('status','1')->latest('id');
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
                    ->addColumn('fname', function ($data) {
                        return $data->fname ?? '--';
                    })
                    ->addColumn('lname', function ($data) {
                        return $data->lname ?? '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('avatar', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<select id="role_change_'.$data->id.'"  class="form-control" onchange="roleChange('.$data->id.')">
                            <option value="2">Doctor</option>
                            <option value="3">Client</option>
                        </select>';
                    })
                    ->rawColumns(['avatar', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function roleChange(Request $request)
    {
        if($request->ajax()){
            if (Gate::allows('isAdmin')) {
                $user = User::with('role')->where('id',$request->userid)->first();
                $user->update([
                    'role_id'  => $request->role,
                ]);
                return response()->json([
                    'status' => 'success',
                    'message'=> 'Role Change Successful',
                ]);
            } else {
                abort(401);
            }
        }
    }


    public function doctorStatusChange(Request $request)
    {
        if($request->ajax()){
            if (Gate::allows('isAdmin')) {
                $user = User::with('role')->where('id',$request->userid)->first();
                $user->update([
                    'status'  => $request->status,
                ]);
                return response()->json([
                    'status' => 'success',
                    'message'=> 'Status Change Successful',
                ]);
            } else {
                abort(401);
            }
        }
    }


    public function doctors()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Doctors');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allDoctors']               = 'active';
            $data['breadcrumb']              = ['All Doctors' => '',];
            return view('backend.pages.users.doctors', $data);
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
    public function doctorsGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = User::with('role')->where('role_id', 2)->where('status','1')->latest('id');
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
                    ->addColumn('fname', function ($data) {
                        return $data->fname ?? '--';
                    })
                    ->addColumn('lname', function ($data) {
                        return $data->lname ?? '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('avatar', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<select id="role_change_'.$data->id.'"  class="form-control" onchange="roleChange('.$data->id.')">
                            <option value="1">Admin</option>
                            <option value="3">Client</option>
                        </select>';
                    })
                    ->rawColumns(['avatar', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function pendingDoctors()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Pending Doctors');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allPendingDoctors']       = 'active';
            $data['breadcrumb']              = ['All Pending Doctors' => '',];
            return view('backend.pages.users.pending-doctor', $data);
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
    public function pendingDoctorsGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = User::with('role')->where('role_id', 2)->where('status','2')->latest('id');
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
                    ->addColumn('fname', function ($data) {
                        return $data->fname ?? '--';
                    })
                    ->addColumn('lname', function ($data) {
                        return $data->lname ?? '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('avatar', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('change_status', function ($data) {
                        return '<select class="form-control" id="doctor_status_'.$data->id.'" onchange="doctorStatuschange('.$data->id.')">
                                    <option value="1" '.($data->status == '1' ? 'selected' : '').'>Active</option>
                                    <option value="2" '.($data->status == '2' ? 'selected' : '').'>Pending</option>
                                    <option value="3" '.($data->status == '3' ? 'selected' : '').'>Cancel</option>
                                </select>';

                    })
                    ->rawColumns(['avatar', 'status', 'change_status'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function cancelDoctors()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Cancel Doctors');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['cancelDoctors']            = 'active';
            $data['breadcrumb']              = ['Cancel Doctors' => '',];
            return view('backend.pages.users.cancel-doctor', $data);
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
    public function cancelDoctorsGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = User::with('role')->where('role_id', 2)->where('status','3')->latest('id');
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
                    ->addColumn('fname', function ($data) {
                        return $data->fname ?? '--';
                    })
                    ->addColumn('lname', function ($data) {
                        return $data->lname ?? '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('avatar', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        if($data->status == '1'){
                          return  '<span class="badge badge-sm badge-success py-1 px-2">Active</span>';
                        }else if($data->status == '2'){
                            return  '<span class="badge badge-sm badge-warning py-1 px-2">Pending</span>';
                        }else{
                            return  '<span class="badge badge-sm badge-danger py-1 px-2">Cancel</span>';
                        }
                    })
                    ->addColumn('change_status', function ($data) {
                        return '<select class="form-control" id="doctor_status_'.$data->id.'" onchange="doctorStatuschange('.$data->id.')">
                                    <option value="1" '.($data->status == '1' ? 'selected' : '').'>Active</option>
                                    <option value="2" '.($data->status == '2' ? 'selected' : '').'>Pending</option>
                                    <option value="3" '.($data->status == '3' ? 'selected' : '').'>Cancel</option>
                                </select>';

                    })
                    ->rawColumns(['avatar', 'status', 'change_status'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function clients()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Clients');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allClients']               = 'active';
            $data['breadcrumb']              = ['All Clients' => '',];
            return view('backend.pages.users.clients', $data);
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
    public function clientsGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = User::with('role')->where('role_id', 3)->latest('id');
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
                    ->addColumn('fname', function ($data) {
                        return $data->fname ?? '--';
                    })
                    ->addColumn('lname', function ($data) {
                        return $data->lname ?? '--';
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('avatar', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<select id="role_change_'.$data->id.'"  class="form-control" onchange="roleChange('.$data->id.')">
                            <option value="">Select Status</option>
                            <option value="1">Admin</option>
                        </select>';
                    })
                    ->rawColumns(['avatar', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function subscribers()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Subscribers');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allSubscribers']          = 'active';
            $data['breadcrumb']              = ['All Subscribers' => '',];
            return view('backend.pages.users.subscribers', $data);
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
    public function subscribersGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = Subscriber::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('email', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('email', function ($data) {
                        return $data->email ?? '--';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->rawColumns(['status'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function allReview()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('All Review');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allReview']          = 'active';
            $data['breadcrumb']              = ['All Review' => '',];
            return view('backend.pages.users.reviews.index', $data);
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
    public function reviewGetData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = Review::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('status', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('review', function ($data) {
                        return $data->review;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.user.management.reviews.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.user.management.reviews.delete', ['id' => $data->id]) . '"
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

    public function reviewCreate()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Review Create');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allReview']               = 'active';
            $data['clients']                 = User::with('role')->where('role_id', 3)->latest('id')->get();
            $data['totalReview']             = Review::get();
            $data['breadcrumb']              = ['All Review' => route('admin.user.management.reviews'), 'Review Create' => ''];
            return view('backend.pages.users.reviews.create', $data);
        } else {
            abort(401);
        }
    }

    public function reviewStore(ReviewRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            Review::create([
                'user_id' => $request->user_id,
                'review'  => $request->review,
                'order_by'=> $request->order_by,
                'status'  => $request->status,
            ]);
            return redirect()->route('admin.user.management.reviews')->with('success','Review Create Successfuly !');
        } else {
            abort(401);
        }
    }

    public function reviewEdit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Review Edit');
            $data['parentUserManage']        = 'expanded';
            $data['parentUserManageSubMenu'] = 'style="display:block;"';
            $data['allReview']               = 'active';
            $data['clients']                 = User::with('role')->where('role_id', 3)->latest('id')->get();
            $data['totalReview']             = Review::get();
            $data['editReview']              = Review::where('id',$id)->first();
            $data['breadcrumb']              = ['All Review' => route('admin.user.management.reviews'), 'Review Edit' => ''];
            return view('backend.pages.users.reviews.edit', $data);
        } else {
            abort(401);
        }
    }

    public function reviewUpdate(ReviewRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editReview = Review::where('id',$request->update_id)->first();
            $editReview->update([
                'user_id' => $request->user_id,
                'review'  => $request->review,
                'order_by'=> $request->order_by,
                'status'  => $request->status,
            ]);
            return redirect()->route('admin.user.management.reviews')->with('success','Review Update Successfuly !');
        } else {
            abort(401);
        }
    }

    public function reviewDelete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editReview = Review::where('id',$id)->first();
            $editReview->delete();
            return back()->with('success','Review Delete Successfuly !');
        } else {
            abort(401);
        }
    }

}
