<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Client;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\DepartmentModel;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
   public function services(){
        $this->setPageTitle('Services');
        $data['breadcrumb']         = ['Home' => url('/'), 'Services' => ''];
        $data['servicesDatas']      = Service::where('status', '1')->orderBy('order_by','asc')->get();
        $data['clientDatas']        = Client::where('status', '1')->orderBy('order_by','asc')->get();
        $data['departments']        = DepartmentModel::where('status','1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.services.index', $data);
   }

   public function serviceDetailse($id){
        $this->setPageTitle('Service Details');
        $data['breadcrumb']         = ['Home' => url('/'), 'Service Detailse' => ''];
        $data['servicesData']      = Service::where('id', $id)->first();
        return view('frontend.pages.services.details', $data);
   }
}
