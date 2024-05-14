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
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $this->setPageTitle('Home');
        $data['silders']            = SilderSection::where('status','1')->orderBy('order_by','asc')->get();
        $data['schedules']          = Schedule::where('status','1')->orderBy('order_by','asc')->get();
        $data['feautesTitle']       = TitleDiscrption::where('section_name','Feautes_section')->where('status','1')->first();
        $data['feautes']            = Feautes::where('status','1')->orderBy('order_by','asc')->get();
        $data['funFacts']           = FunFacts::where('status','1')->orderBy('order_by','asc')->get();
        $data['whyChooseTitle']     = TitleDiscrption::where('section_name','Why_choose_section')->where('status','1')->first();
        $data['whyChooseData']      = WhyChoose::where('status','1')->first();
        $data['callToAction']       = CallToAction::where('status','1')->first();
        $data['portfolioSection']   = TitleDiscrption::where('section_name','Portfolio_section')->where('status','1')->first();
        $data['portfolioDatas']     = PortfolioSection::where('status', '1')->orderBy('order_by','asc')->get();
        $data['servicesSection']    = TitleDiscrption::where('section_name','Services_section')->where('status','1')->first();
        $data['servicesDatas']      = Service::where('status', '1')->orderBy('order_by','asc')->get();
        $data['pricingSection']     = TitleDiscrption::where('section_name','Pricing_table_section')->where('status','1')->first();
        $data['pricingDatas']       = PricingTable::where('status', '1')->orderBy('order_by','asc')->get();
        $data['blogsSection']       = TitleDiscrption::where('section_name','Blog_section')->where('status','1')->first();
        $data['blogsDatas']         = Blog::where('status','1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        $data['appointmentSection'] = TitleDiscrption::where('section_name','Appointment')->where('status','1')->first();
        $data['appointmentData']    = Appointment::where('status','1')->first();
        $data['newsletterSection']  = TitleDiscrption::where('section_name','Newsletter_section')->where('status','1')->first();
        $data['teamSection']        = TitleDiscrption::where('section_name','TeamSection')->where('status','1')->first();
        $data['teamMembers']        = DepartmentModel::with(['doctors'])->where('status','1')->get();
        $data['testimonialSection'] = TitleDiscrption::where('section_name','TestimonialSection')->where('status','1')->first();
        $data['testimonials']       = Review::with('user')->where('status','1')->orderBy('order_by','asc')->get();
        $data['departmentSection']  = TitleDiscrption::where('section_name','DepartmentSection')->where('status','1')->first();
        $data['departments']        = DepartmentModel::where('status','1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.home',$data);
    }
}
