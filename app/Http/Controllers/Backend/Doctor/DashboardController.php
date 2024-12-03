<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $this->setPageTitle('Doctor Dashboard');
        $data['docotorDashboard']         = 'active';
        $data['breadcrumb']               = ['Doctor Dashboard' => ''];
        $data['admin']                    = User::where('role_id',1)->first();
        return view('backend.doctor.dashboard.index',$data);
    }
}
