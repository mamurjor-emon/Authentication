<?php

namespace App\Http\Controllers\Frontend;

use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;
use App\Models\TitleDiscrption;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function doctors()
    {
        $this->setPageTitle('Medical And Doctors');
        $data['breadcrumb']         = ['Home' => url('/'), 'Meet Our Qualified Doctors' => ''];
        $data['doctors']            = DoctorModel::with(['user','department'])->where('status','1')->get();
        $data['newsletterSection']  = TitleDiscrption::where('section_name','Newsletter_section')->where('status','1')->first();
        return view('frontend.pages.doctors.all-doctors', $data);
    }

    public function singleDoctors($id)
    {
        $this->setPageTitle('Doctor Details');
        $data['breadcrumb']     = ['Home' => url('/'), 'Doctor Details' => ''];
        $data['singleDoctor']   = DoctorModel::with(['user','department'])->where('id',$id)->where('status','1')->get();
        return view('frontend.pages.doctors.single-doctor', $data);
    }
}
