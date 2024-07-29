<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ThemeSettingController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Slots');
            $data['parentDoctors']        = 'expanded';
            $data['parentDoctorsSubMenu'] = 'style="display: block;"';
            $data['addSlot']              = 'active';
            $data['breadcrumb']           = ['Slots' => '',];
            return view('backend.pages.doctors.slots.index', $data);
        } else {
            abort(401);
        }
    }
}
