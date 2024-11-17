<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontedApppontmentRequest;
use App\Models\DoctorModel;
use App\Models\SlotModel;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function departmentDoctor(Request $request){
        if($request->ajax()){
            $doctors = DoctorModel::with(['user'])->where('department_id',$request->id)->where('status','1')->get();
            $doctorsData = '';
            if($doctors->count() > 0){
                foreach($doctors as $doctor){
                    $doctorsData .= '<li data-value="' . ($doctor->id ?? '') . '" class="option">' . ($doctor->user->fname ?? '') .'-'. ($doctor->user->lname ?? '').'</li>';
                }
            }else{
                $doctorsData .= '<li class="text-danger text-center" data-value="" class="option">No Doctor Found !</li>';
            }
            return response()->json([
                'status' => 'success',
                'doctors' => $doctorsData,
            ],200);
        }
    }
    public function appointmentSolts(Request $request){
        if($request->ajax()){
            $request->validate([
                'selectedDate'  => ['required'],
                'doctorId'      => ['required'],
            ]);
            $slots = SlotModel::where('status','1')->get();
            $slotsData = '';
            if($slots->count() > 0){
                foreach($slots as $slot){
                    $slotsData .= '<li data-value="' . ($slot->id ?? '') . '" class="option">' . ($slot->start_time ?? '') .'-'. ($slot->start_zone ?? ''). '--'.($slot->end_time ?? '') .'-'. ($slot->end_zone ?? '').'</li>';
                }
            }else{
                $slotsData .= '<li class="text-danger text-center" data-value="" class="option">No Slot Found !</li>';
            }
            return response()->json([
                'status' => 'success',
                'slots' => $slotsData,
            ],200);
        }
    }
    // FrontedApppontmentRequest
    public function appointmentBooking(Request $request){
        dd($request->all());
    }
}
