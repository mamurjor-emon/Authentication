<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $this->setPageTitle('Doctor Dashboard');
        $data['docotorDashboard']         = 'active';
        $data['breadcrumb']               = ['Doctor Dashboard' => ''];
        $data['admin']                    = User::where('role_id',1)->first();
        return view('backend.doctor.dashboard.index',$data);
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
