<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenusController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Menus');
            $breadcrumb = ['Dashboard' => route('admin.dashboard'), 'Menus' => '',];
            return view('backend.pages.menus.index', compact('breadcrumb'));
        } else {
            abort(401);
        }
    }
}
