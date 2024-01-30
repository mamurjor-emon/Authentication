<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FooterBottomRequest;
use App\Models\FooterBottom;
use Illuminate\Support\Facades\Gate;

class FooterBottomController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Footer Bottom Section');
            $data['parentHomeMenu']     = 'expanded';
            $data['parentHomeSubMenu']  = 'style="display: block;"';
            $data['footerBottomActive'] = 'active';
            $data['breadcrumb']         = ['Footer Bottom Section' => '',];
            $data['footerBottomData']   = FooterBottom::first();
            return view('backend.pages.footer-bottom.index', $data);
        } else {
            abort(401);
        }
    }
    public function createOrUpdate(FooterBottomRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            FooterBottom::updateOrCreate(['id' => $request->update_id], [
                'title'  => $request->title,
                'name'   => $request->name,
                'url'    => $request->url,
                'target' => $request->target,
                'status' => $request->status,
            ]);
            return back()->with('success', 'Footer Bottom Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }
}
