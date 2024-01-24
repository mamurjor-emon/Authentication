<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CallToActionRequest;
use App\Models\CallToAction;
use Illuminate\Support\Facades\Gate;

class CallActionController extends Controller
{
  public function index(){
    if (Gate::allows('isAdmin')) {
        $this->setPageTitle('Call To Action');
        $data['parentHomeMenu']     = 'expanded';
        $data['parentHomeSubMenu']  = 'style="display: block;"';
        $data['callToActionActive'] = 'active';
        $data['breadcrumb']         = ['Call To Action' => '',];
        $data['callToAction']       = CallToAction::first();
        return view('backend.pages.call-to-action.index', $data);
    } else {
        abort(401);
    }
  }
  public function createOrUpdate(CallToActionRequest $request)
  {
      if (Gate::allows('isAdmin')) {
        CallToAction::updateOrCreate(['id' => $request->update_id], [
            'title'        => $request->title,
            'sub_title'    => $request->sub_title,
            'f_btn_title'  => $request->f_btn_title,
            'f_btn_url'    => $request->f_btn_url,
            'f_btn_target' => $request->f_btn_target,
            'l_btn_title'  => $request->l_btn_title,
            'l_btn_url'    => $request->l_btn_url,
            'l_btn_target' => $request->l_btn_target,
            'status'       => $request->status,
          ]);
          return back()->with('success', 'Call To Action Create Or Update Successfuly !!');
      } else {
          abort(401);
      }
  }
}
