<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PatientAppontment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Gate::allows('isDoctor')) {
            $this->setPageTitle('Doctor Dashboard');
            $data['docotorDashboard']         = 'active';
            $data['admin']                    = User::where('role_id', 1)->first();
            $data['totalAppointments']        = PatientAppontment::where('doctor_id',Auth::id())->count();
            $data['totalPendingAppointments'] = PatientAppontment::where('doctor_id',Auth::id())->where('status','0')->count();
            $data['totalVisitedAppointments'] = PatientAppontment::where('doctor_id',Auth::id())->where('status','1')->count();
            $data['totalAnnualProfits']       = PatientAppontment::where('doctor_id',Auth::id())->where('status','1')->count();
            return view('backend.doctor.dashboard.index', $data);
        } else {
            abort(401);
        }
    }
    public function dashboardNotificationsCount(Request $request)
    {
        if (Gate::allows('isAdmin')) {
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
        } else {
            abort(401);
        }
    }
}
