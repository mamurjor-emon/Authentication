<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $this->setPageTitle('Doctor Dashboard');
        return view('backend.doctor.dashboard.index');
    }
}
