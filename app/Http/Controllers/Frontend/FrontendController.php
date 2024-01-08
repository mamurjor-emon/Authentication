<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $this->setPageTitle('Home');
        $parentMenus = Menu::where('parent_id', 0)->where('status', '1')->get();
        return view('frontend.pages.home',compact('parentMenus'));
    }
}
