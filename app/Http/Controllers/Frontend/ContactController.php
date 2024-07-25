<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\TitleDiscrption;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactFormModel;

class ContactController extends Controller
{
    public function contact()
    {
        $this->setPageTitle('Contact Details');
        $data['breadcrumb']   = ['Home' => url('/'), 'Contact Details' => ''];
        $data['newsletterSection']  = TitleDiscrption::where('section_name','Newsletter_section')->where('status','1')->first();
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
            'condition' => $request->condition ?? 0,
       ]);
       return back()->with('success','Contact Store Successfully !!');
    }
}
