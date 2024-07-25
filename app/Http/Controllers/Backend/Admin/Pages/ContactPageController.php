<?php

namespace App\Http\Controllers\Backend\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;

class ContactPageController extends Controller
{
    public function contactPage(Request $request){
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Contact Page Setting');
            $data['parentPages']            = 'expanded';
            $data['parentPagesSubMenu']     = 'style="display: block;"';
            $data['ContactPageActive']      = 'active';
            $data['breadcrumb']             = ['Contact Page Setting' => '',];
            return view('backend.pages.contact-page.index', $data);
        } else {
            abort(401);
        }
    }

    public function contactPageStore(ContactRequest $request){
        if (Gate::allows('isAdmin')) {
            Setting::updateOrCreate(['option_key' => 'con_title'],['option_value' => $request->con_title]);
            Setting::updateOrCreate(['option_key' => 'con_sub_title'],['option_value' => $request->con_sub_title]);
            Setting::updateOrCreate(['option_key' => 'con_map_url'],['option_value' => $request->con_map_url]);
            Setting::updateOrCreate(['option_key' => 'con_phone_number'],['option_value' => $request->con_phone_number]);
            Setting::updateOrCreate(['option_key' => 'con_email'],['option_value' => $request->con_email]);
            Setting::updateOrCreate(['option_key' => 'con_address'],['option_value' => $request->con_address]);
            Setting::updateOrCreate(['option_key' => 'con_address_two'],['option_value' => $request->con_address_two]);
            Setting::updateOrCreate(['option_key' => 'con_open_day'],['option_value' => $request->con_open_day]);
            Setting::updateOrCreate(['option_key' => 'con_weekend_day'],['option_value' => $request->con_weekend_day]);
            Setting::updateOrCreate(['option_key' => 'con_terms_and_condition'],['option_value' => $request->con_terms_and_condition]);
            return back()->with('success','Contact Setting Store Successfully !');
        } else {
            abort(401);
        }
    }
}
