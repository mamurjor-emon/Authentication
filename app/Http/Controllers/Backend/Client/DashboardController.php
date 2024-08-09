<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $this->setPageTitle('Client Dashboard');
        return view('backend.client.dashboard.index');
    }
}
