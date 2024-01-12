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
            $dashboard = 'active';
            return view('backend.pages.back',compact('dashboard'));
        } else {
            abort(401);
        }
    }
}
