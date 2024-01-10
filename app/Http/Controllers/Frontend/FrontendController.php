<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SilderSection;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $this->setPageTitle('Home');
        $parentMenus = Menu::where('parent_id', 0)->where('status', '1')->get();
        $silders = SilderSection::where('status','1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.home',compact('parentMenus','silders'));
    }
}
