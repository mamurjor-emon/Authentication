<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function dashboard()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Dashboard');
            $data['dashboard'] = 'active';
            return view('backend.pages.dashboard.back',$data);
        } else {
            abort(401);
        }
    }

    public function profile()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Profile Update');
            $data['breadcrumb']  = ['Dashboard' => route('admin.dashboard'),'Profile Update' => '',];
            return view('backend.pages.dashboard.profile');
        } else {
            abort(401);
        }
    }
}
