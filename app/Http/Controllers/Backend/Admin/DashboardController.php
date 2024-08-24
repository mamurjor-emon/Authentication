<?php

namespace App\Http\Controllers\Backend\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Visitor;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\Blog;
use App\Models\Subscriber;

class DashboardController extends Controller
{

    public function dashboard()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Dashboard');
            $data['dashboard']     = 'active';
            $data['totalUsers']    = User::all();
            $data['verify_users']  = User::whereNotNull('email_verified_at')->get();
            $data['allDoctors']    = DoctorModel::where('status', '1')->get();
            $data['cancelDoctors'] = DoctorModel::where('status', '0')->get();;
            return view('backend.pages.dashboard.back', $data);
        } else {
            abort(401);
        }
    }

    public function profile()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Profile Update');
            $data['breadcrumb'] = ['Dashboard' => route('admin.dashboard.index'), 'Profile Update' => '',];
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

    public function dashboardUserChatCount(Request $request)
    {
        if ($request->ajax()) {
            $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $usersData = [];
            foreach ($month as $value) {
                $usersData[] = DB::table('users')->whereMonth('updated_at', '=', $value)->count();
            }
            return response()->json([
                'usersData'  => $usersData,
            ]);
        }
    }

    public function dashboardActiveDoctorCount()
    {
        $data['totalDoctors']   =  DoctorModel::count();
        $data['activeDoctors']  =  DoctorModel::where('status','1')->count();
        $total = ($data['activeDoctors'] * 100) / $data['totalDoctors'];
        $data['totalPersentage'] = floor($total);
        return response()->json($data, 200);
    }
    public function dashboardVisitorsCount(Request $request)
    {
        if ($request->ajax()) {

            $dates = [];
            for ($i = 0; $i < 30; $i++) {
                $dates[] = Carbon::now()->subDays($i)->toDateString();
            }
            $dates = array_reverse($dates);
            $visitors = [];
            foreach ($dates as $date) {
                $visitors[] = Visitor::whereDate('created_at', '=', $date)->count();
            }
            return response()->json([
                'visitors' => $visitors,
            ]);
        }
    }

    public function dashboardDoctorsChatCount(Request $request)
    {
        if ($request->ajax()) {
            $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $doctorsData = [];
            foreach ($month as $value) {
                $doctorsData[] = DoctorModel::whereMonth('updated_at', '=', $value)->count();
            }
            return response()->json([
                'doctorsData'  => $doctorsData,
            ]);
        }
    }

    public function dashboardSubscribersChatCount(Request $request)
    {
        if ($request->ajax()) {
            $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $subscriberData = [];
            foreach ($month as $value) {
                $subscriberData[] = Subscriber::whereMonth('updated_at', '=', $value)->count();
            }
            return response()->json([
                'subscriberData'  => $subscriberData,
            ]);
        }
    }

    public function dashboardBlogsChatCount(Request $request)
    {
        if ($request->ajax()) {
            $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
            $blogsData = [];
            foreach ($month as $value) {
                $blogsData[] = Blog::whereMonth('updated_at', '=', $value)->count();
            }
            return response()->json([
                'blogsData'  => $blogsData,
            ]);
        }
    }

    public function dashboardNotificationsCount(Request $request)
    {
        if ($request->ajax()) {
            $notificationCount = formatNumber(Auth::user()->unreadNotifications->count());
            $notifications = Auth::user()->unreadNotifications;
            $getNotification = '';
            if (!empty($notifications)) {
                foreach ($notifications as $notification) {
                    $icon = '';
                    if ($notification->data['status'] == 'new_user_create') {
                        $icon = 'mdi-account-outline';
                    }
                    $getNotification .= '<li class="mdc-list-item" role="menuitem">';
                    $getNotification .= '<div class="item-thumbnail item-thumbnail-icon">';
                    $getNotification .= !empty($icon) ? '<i class="mdi ' . $icon . '"></i>' : '';
                    $getNotification .= '</div>';
                    $getNotification .= '<div class="item-content d-flex align-items-start flex-column justify-content-center">';
                    $getNotification .= '<h6 class="item-subject font-weight-normal">' . ($notification->data['message'] ?? 'New Notification') . '</h6>';
                    $getNotification .= '<small class="text-muted">' . $notification->created_at->diffForHumans() . '</small>';
                    $getNotification .= '</div>';
                    $getNotification .= '</li>';
                }
            }
            return response()->json([
                'status'            => 'success',
                'notificationCount' => $notificationCount,
                'getNotification'   => $getNotification,
            ]);
        }
    }
}
