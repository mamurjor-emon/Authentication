<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\TitleDiscrption;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
   public function services(){
        $this->setPageTitle('Services');
        $data['breadcrumb']         = ['Home' => url('/'), 'Services' => ''];
        $data['servicesSection']    = TitleDiscrption::where('section_name','Services_section')->where('status','1')->first();
        $data['servicesDatas']      = Service::where('status', '1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        $data['appointmentSection'] = TitleDiscrption::where('section_name','Appointment')->where('status','1')->first();
        $data['appointmentData']    = Appointment::where('status','1')->first();
        $data['newsletterSection']  = TitleDiscrption::where('section_name','Newsletter_section')->where('status','1')->first();
        return view('frontend.pages.services.index', $data);
   }

   public function serviceDetailse(){
        $this->setPageTitle('Service Detailse');
        $data['breadcrumb']         = ['Home' => url('/'), 'Service Detailse' => ''];
        return view('frontend.pages.services.details', $data);
   }
}
