<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\CallToAction;
use App\Models\Client;
use App\Models\DepartmentModel;
use App\Models\Feautes;
use App\Models\FunFacts;
use App\Models\PortfolioSection;
use App\Models\PricingTable;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\SilderSection;
use App\Models\TitleDiscrption;
use App\Models\Visitor;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        $this->setPageTitle('Home');
        $data['silders']            = SilderSection::where('status','1')->orderBy('order_by','asc')->get();
        $data['schedules']          = Schedule::where('status','1')->orderBy('order_by','asc')->get();
        $data['feautes']            = Feautes::where('status','1')->orderBy('order_by','asc')->get();
        $data['funFacts']           = FunFacts::where('status','1')->orderBy('order_by','asc')->get();
        $data['portfolioDatas']     = PortfolioSection::where('status', '1')->orderBy('order_by','asc')->get();
        $data['servicesDatas']      = Service::where('status', '1')->orderBy('order_by','asc')->get();
        $data['testimonials']       = Review::with('user')->where('status','1')->orderBy('order_by','asc')->get();
        $data['departments']        = DepartmentModel::where('status','1')->orderBy('order_by','asc')->get();
        $data['pricingDatas']       = PricingTable::where('status', '1')->orderBy('order_by','asc')->get();
        $data['teamMembers']        = DepartmentModel::with(['doctors'])->where('status','1')->get();
        $data['blogsDatas']         = Blog::where('status','1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        Visitor::firstOrCreate(['ip_address' => $request->ip()], [
            'ip_address' => $request->ip(),
        ]);
        return view('frontend.pages.home',$data);
    }

    public function testimonials(){
        $this->setPageTitle('Testimonials');
        $data['breadcrumb']         = ['Home' => url('/'), 'Testimonials' => ''];
        $data['feautes']            = Feautes::where('status','1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        $data['servicesDatas']      = Service::where('status', '1')->orderBy('order_by','asc')->get();
        $data['testimonials']       = Review::with('user')->where('status','1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.testimonials.testimonials',$data);
    }

    public function pricing(){
        $this->setPageTitle('Pricing');
        $data['breadcrumb']         = ['Home' => url('/'), 'Pricing' => ''];
        $data['pricingDatas']       = PricingTable::where('status', '1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.pricing.pricing',$data);
    }
}
