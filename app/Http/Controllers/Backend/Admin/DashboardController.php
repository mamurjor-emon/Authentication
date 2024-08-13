<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\DoctorModel;

class DashboardController extends Controller
{

    public function dashboard()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Dashboard');
            $data['dashboard']     = 'active';
            $data['totalUsers']    = User::all();
            $data['verify_users']  = User::whereNotNull('email_verified_at')->get();
            $data['allDoctors']    = User::where('role_id',2)->get();
            $data['cancelDoctors'] = User::where('role_id',2)->where('status', '3')->get();
            return view('backend.pages.dashboard.back', $data);
        } else {
            abort(401);
        }
    }

    public function profile()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Profile Update');
            $data['breadcrumb'] = ['Dashboard' => route('admin.dashboard'), 'Profile Update' => '',];
            return view('backend.pages.dashboard.profile', $data);
        } else {
            abort(401);
        }
    }

    public function profileUpdate(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $user = User::where('id', Auth::id())->first();
            if ($request->file('avatar')) {
                $avatar = $this->imageUpload($request->file('avatar'), 'images/profile/', null, null);
            } else {
                $avatar = $user->avatar;
            }
            $user->update([
                'fname'  => $request->fname,
                'lname'  => $request->lname,
                'avatar' => $avatar,
                'phone'  => $request->phone,
            ]);
            return back()->with('success', 'Profile Updated Successfully !');
        } else {
            abort(401);
        }
    }

    public function profilePasswordUpdate(PasswordUpdateRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $user = Auth::user();
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            } else {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                if ($request->action == 0) {
                    return back()->with('success', 'Password Update Successfully !');
                } else {
                    Auth::logout();
                    return redirect()->route('login')->with('success', 'Password Update Successfully !');
                }
            }
        } else {
            abort(401);
        }
    }

    public function dashboardUserChatCount(Request $request){
        if ($request->ajax()) {
            $month = ['1','2','3','4','5','6','7','8','9','10','11','12'];
            $usersData = [];
            foreach ($month as $value) {
                $usersData[] = DB::table('users')->whereMonth('updated_at', '=', $value)->count();
            }
            return response()->json([
                'usersData'  => $usersData,
            ]);
        }
    }

    public function dashboardActiveDoctorCount(){
        $data['totalDoctors']   =  User::where('role_id',2)->count();
        $data['activeDoctors']  =  User::where('role_id',2)->where('status',1)->count();
        $total = ($data['activeDoctors'] * 100 ) / $data['totalDoctors'] ;
        $data['totalPersentage'] = floor($total);
        return response()->json($data, 200);
       }
}
