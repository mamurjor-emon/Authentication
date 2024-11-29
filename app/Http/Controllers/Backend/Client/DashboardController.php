<?php

namespace App\Http\Controllers\Backend\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard(){

        if (Gate::allows('isClient')) {
            $this->setPageTitle('Client Dashboard');
            $data['clientDashboard']          = 'active';
            $data['breadcrumb']               = ['Client Dashboard' => '',];
            return view('backend.client.dashboard.index',$data);
        } else {
            abort(401);
        }
    }
}
