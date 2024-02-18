<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                                    ->orWhere('fname', 'like', "%{$value}%")
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
                                    ->orWhere('fname', 'like', "%{$value}%")
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
                                    ->orWhere('fname', 'like', "%{$value}%")
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

    // public function admins()
    // {
    //     if (Gate::allows('isAdmin')) {
    //         $this->setPageTitle('All Admins');
    //         $data['parentUserManage']        = 'expanded';
    //         $data['parentUserManageSubMenu'] = 'style="display:block;"';
    //         $data['allAdmins']               = 'active';
    //         $data['breadcrumb']              = ['All Admins' => '',];
    //         return view('backend.pages.users.admins', $data);
    //     } else {
    //         abort(401);
    //     }
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function getData(Request $request)
    // {
    //     if (Gate::allows('isAdmin')) {
    //         if ($request->ajax()) {
    //             $getData = User::with('role')->where('role_id', 1)->latest('id');
    //             return DataTables::eloquent($getData)
    //                 ->addIndexColumn()
    //                 ->filter(function ($query) use ($request) {
    //                     if (!empty($request->search)) {
    //                         $query->when($request->search, function ($query, $value) {
    //                             $query->where('fname', 'like', "%{$value}%")
    //                                 ->orWhere('fname', 'like', "%{$value}%")
    //                                 ->orWhere('email', 'like', "%{$value}%")
    //                                 ->orWhere('phone', 'like', "%{$value}%");
    //                         });
    //                     }
    //                 })
    //                 ->addColumn('fname', function ($data) {
    //                     return $data->fname ?? '--';
    //                 })
    //                 ->addColumn('lname', function ($data) {
    //                     return $data->lname ?? '--';
    //                 })
    //                 ->addColumn('email', function ($data) {
    //                     return $data->email ?? '--';
    //                 })
    //                 ->addColumn('avatar', function ($data) {
    //                     return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
    //                 })
    //                 ->addColumn('phone', function ($data) {
    //                     return $data->phone ?? '--';
    //                 })
    //                 ->addColumn('status', function ($data) {
    //                     return status($data->status);
    //                 })
    //                 ->addColumn('action', function ($data) {
    //                     return '<select  class="form-control" name="role">
    //                         <option value="2">Doctor</option>
    //                         <option value="3">Client</option>
    //                     </select>';
    //                 })
    //                 ->rawColumns(['avatar', 'status', 'action'])
    //                 ->make(true);
    //         }
    //     } else {
    //         abort(401);
    //     }
    // }
    // public function admins()
    // {
    //     if (Gate::allows('isAdmin')) {
    //         $this->setPageTitle('All Admins');
    //         $data['parentUserManage']        = 'expanded';
    //         $data['parentUserManageSubMenu'] = 'style="display:block;"';
    //         $data['allAdmins']               = 'active';
    //         $data['breadcrumb']              = ['All Admins' => '',];
    //         return view('backend.pages.users.admins', $data);
    //     } else {
    //         abort(401);
    //     }
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function getData(Request $request)
    // {
    //     if (Gate::allows('isAdmin')) {
    //         if ($request->ajax()) {
    //             $getData = User::with('role')->where('role_id', 1)->latest('id');
    //             return DataTables::eloquent($getData)
    //                 ->addIndexColumn()
    //                 ->filter(function ($query) use ($request) {
    //                     if (!empty($request->search)) {
    //                         $query->when($request->search, function ($query, $value) {
    //                             $query->where('fname', 'like', "%{$value}%")
    //                                 ->orWhere('fname', 'like', "%{$value}%")
    //                                 ->orWhere('email', 'like', "%{$value}%")
    //                                 ->orWhere('phone', 'like', "%{$value}%");
    //                         });
    //                     }
    //                 })
    //                 ->addColumn('fname', function ($data) {
    //                     return $data->fname ?? '--';
    //                 })
    //                 ->addColumn('lname', function ($data) {
    //                     return $data->lname ?? '--';
    //                 })
    //                 ->addColumn('email', function ($data) {
    //                     return $data->email ?? '--';
    //                 })
    //                 ->addColumn('avatar', function ($data) {
    //                     return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
    //                 })
    //                 ->addColumn('phone', function ($data) {
    //                     return $data->phone ?? '--';
    //                 })
    //                 ->addColumn('status', function ($data) {
    //                     return status($data->status);
    //                 })
    //                 ->addColumn('action', function ($data) {
    //                     return '<select  class="form-control" name="role">
    //                         <option value="2">Doctor</option>
    //                         <option value="3">Client</option>
    //                     </select>';
    //                 })
    //                 ->rawColumns(['avatar', 'status', 'action'])
    //                 ->make(true);
    //         }
    //     } else {
    //         abort(401);
    //     }
    // }

    // public function admins()
    // {
    //     if (Gate::allows('isAdmin')) {
    //         $this->setPageTitle('All Admins');
    //         $data['parentUserManage']        = 'expanded';
    //         $data['parentUserManageSubMenu'] = 'style="display:block;"';
    //         $data['allAdmins']               = 'active';
    //         $data['breadcrumb']              = ['All Admins' => '',];
    //         return view('backend.pages.users.admins', $data);
    //     } else {
    //         abort(401);
    //     }
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function getData(Request $request)
    // {
    //     if (Gate::allows('isAdmin')) {
    //         if ($request->ajax()) {
    //             $getData = User::with('role')->where('role_id', 1)->latest('id');
    //             return DataTables::eloquent($getData)
    //                 ->addIndexColumn()
    //                 ->filter(function ($query) use ($request) {
    //                     if (!empty($request->search)) {
    //                         $query->when($request->search, function ($query, $value) {
    //                             $query->where('fname', 'like', "%{$value}%")
    //                                 ->orWhere('fname', 'like', "%{$value}%")
    //                                 ->orWhere('email', 'like', "%{$value}%")
    //                                 ->orWhere('phone', 'like', "%{$value}%");
    //                         });
    //                     }
    //                 })
    //                 ->addColumn('fname', function ($data) {
    //                     return $data->fname ?? '--';
    //                 })
    //                 ->addColumn('lname', function ($data) {
    //                     return $data->lname ?? '--';
    //                 })
    //                 ->addColumn('email', function ($data) {
    //                     return $data->email ?? '--';
    //                 })
    //                 ->addColumn('avatar', function ($data) {
    //                     return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
    //                 })
    //                 ->addColumn('phone', function ($data) {
    //                     return $data->phone ?? '--';
    //                 })
    //                 ->addColumn('status', function ($data) {
    //                     return status($data->status);
    //                 })
    //                 ->addColumn('action', function ($data) {
    //                     return '<select  class="form-control" name="role">
    //                         <option value="2">Doctor</option>
    //                         <option value="3">Client</option>
    //                     </select>';
    //                 })
    //                 ->rawColumns(['avatar', 'status', 'action'])
    //                 ->make(true);
    //         }
    //     } else {
    //         abort(401);
    //     }
    // }
    // public function admins()
    // {
    //     if (Gate::allows('isAdmin')) {
    //         $this->setPageTitle('All Admins');
    //         $data['parentUserManage']        = 'expanded';
    //         $data['parentUserManageSubMenu'] = 'style="display:block;"';
    //         $data['allAdmins']               = 'active';
    //         $data['breadcrumb']              = ['All Admins' => '',];
    //         return view('backend.pages.users.admins', $data);
    //     } else {
    //         abort(401);
    //     }
    // }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function getData(Request $request)
    // {
    //     if (Gate::allows('isAdmin')) {
    //         if ($request->ajax()) {
    //             $getData = User::with('role')->where('role_id', 1)->latest('id');
    //             return DataTables::eloquent($getData)
    //                 ->addIndexColumn()
    //                 ->filter(function ($query) use ($request) {
    //                     if (!empty($request->search)) {
    //                         $query->when($request->search, function ($query, $value) {
    //                             $query->where('fname', 'like', "%{$value}%")
    //                                 ->orWhere('fname', 'like', "%{$value}%")
    //                                 ->orWhere('email', 'like', "%{$value}%")
    //                                 ->orWhere('phone', 'like', "%{$value}%");
    //                         });
    //                     }
    //                 })
    //                 ->addColumn('fname', function ($data) {
    //                     return $data->fname ?? '--';
    //                 })
    //                 ->addColumn('lname', function ($data) {
    //                     return $data->lname ?? '--';
    //                 })
    //                 ->addColumn('email', function ($data) {
    //                     return $data->email ?? '--';
    //                 })
    //                 ->addColumn('avatar', function ($data) {
    //                     return '<img id="getDataImage" src="' . asset($data->avatar ?? '') . '" alt="image">';
    //                 })
    //                 ->addColumn('phone', function ($data) {
    //                     return $data->phone ?? '--';
    //                 })
    //                 ->addColumn('status', function ($data) {
    //                     return status($data->status);
    //                 })
    //                 ->addColumn('action', function ($data) {
    //                     return '<select  class="form-control" name="role">
    //                         <option value="2">Doctor</option>
    //                         <option value="3">Client</option>
    //                     </select>';
    //                 })
    //                 ->rawColumns(['avatar', 'status', 'action'])
    //                 ->make(true);
    //         }
    //     } else {
    //         abort(401);
    //     }
    // }
}
