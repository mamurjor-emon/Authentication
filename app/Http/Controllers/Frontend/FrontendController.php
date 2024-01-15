<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CallToAction;
use App\Models\Feautes;
use App\Models\FunFacts;
use App\Models\Menu;
use App\Models\Schedule;
use App\Models\SilderSection;
use App\Models\TitleDiscrption;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $this->setPageTitle('Home');
        $data['parentMenus'] = Menu::where('parent_id', 0)->where('status', '1')->orderBy('order_by','asc')->get();
        $data['silders'] = SilderSection::where('status','1')->orderBy('order_by','asc')->get();
        $data['schedules'] = Schedule::where('status','1')->orderBy('order_by','asc')->get();
        $data['feautesTitle'] = TitleDiscrption::where('section_name','Feautes_section')->where('status','1')->first();
        $data['feautes'] = Feautes::where('status','1')->orderBy('order_by','asc')->get();
        $data['funFacts'] = FunFacts::where('status','1')->orderBy('order_by','asc')->get();
        $data['whyChooseTitle'] = TitleDiscrption::where('section_name','Why_choose_section')->where('status','1')->first();
        $data['whyChooseData'] = WhyChoose::where('status','1')->first();
        $data['callToAction'] = CallToAction::where('status','1')->first();
        $data['portfolioSection'] = TitleDiscrption::where('section_name','Portfolio_section')->where('status','1')->first();
        return view('frontend.pages.home',$data);
    }
}
