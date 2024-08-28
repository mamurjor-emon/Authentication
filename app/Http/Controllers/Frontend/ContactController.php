<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\TitleDiscrption;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactFormModel;
use App\Models\DayModel;
use App\Models\TimeTable;

class ContactController extends Controller
{
    public function contact()
    {
        $this->setPageTitle('Contact Details');
        $data['breadcrumb']   = ['Home' => url('/'), 'Contact Details' => ''];
        return view('frontend.pages.contact-page.contact', $data);
    }

    public function store(ContactFormRequest $request)
    {
       ContactFormModel::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,
            'condition' => $request->condition,
       ]);
       return back()->with('success','Contact Store Successfully !!');
    }

    public function timeTable()
    {
        $this->setPageTitle('Time Table');
        $data['breadcrumb'] = ['Home' => url('/'), 'Time Table' => ''];
        $data['days']       = DayModel::where('status','1')->orderBy('order_by','asc')->get();
        $data['times']      = TimeTable::where('status','1')->orderBy('order_by','asc')->get();
        return view('frontend.pages.time-table.time-table', $data);
    }
}
