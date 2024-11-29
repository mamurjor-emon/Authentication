<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SlotModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\PatientAppontment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FrontedApppontmentRequest;

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

    public function appointmentBooking(FrontedApppontmentRequest $request){
        if($request->date != null){
            $getAppontment = PatientAppontment::where('date', $request->data)->where('id',Auth::id())->first();
            if(!$getAppontment){
                // $appointment  = PatientAppontment::create([
                //     'user_id'     => Auth::id(),
                //     'doctor_id'   => $request->doctor_id,
                //     'slot_id'     => $request->slot_id,
                //     'date'        => $request->date,
                //     'description' => $request->description,
                //     'status'      => '1',
                // ]);

                $request['full_name'] = Auth::user()->fname . ' ' . Auth::user()->lname;
                // $request['appointment_button_url'] = route('client.appontment.view',['id' =>  $appointment->id ]);
                $request['appointment_button_title'] = 'Click Here To See You Appointment';

                // User mail
                $subject = emailSubjectTemplate('PATIENT_APPONTMENT_MAIL', $request);
                $body    = emailBodyTemplate('PATIENT_APPONTMENT_MAIL', $request);
                $heading = emailHeadingTemplate('PATIENT_APPONTMENT_MAIL', $request);

                dd($body);

                $userMail = ['subject' => $subject, 'body' => $body, 'heading' => $heading];
                // Mail::to($request->email)->later(now()->addSeconds(10), new VerifyUserMail($userMail));


                // $message = [
                //     'sender' => $user->id,
                //     'to' => $admin->id,
                //     'message' => 'A New User Has Registered: ' . $request->fname . ' ' . $request->lname,
                // ];
                // Broadcast(new NotificationBroadcast($message))->toOthers();
                // $admin->notify(new UserRegisteredNotification($user));


                return back()->with('success', 'Your Appointment Submit Successfully !');
            }else{
                return back()->with('warning', "Your Can't Appointment For Today !");
            }
        }
    }
}
