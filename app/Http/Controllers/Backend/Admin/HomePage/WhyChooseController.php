<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\whyChooseRequest;
use App\Models\WhyChoose;
use Illuminate\Support\Facades\Gate;

class WhyChooseController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Why Choose Section');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['WhyChooseSection']  = 'active';
            $data['breadcrumb']        = ['Why Choose Section' => '',];
            $data['chooseData']        = WhyChoose::first();
            return view('backend.pages.why-choose.index', $data);
        } else {
            abort(401);
        }
    }
    public function createOrUpdate(whyChooseRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->update_id != null) {
                $editChoose = WhyChoose::where('id', $request->update_id)->first();
                if ($editChoose->image != null) {
                    if ($request->file('image')) {
                        $image = $this->imageUpdate($request->file('image'), 'images/choose/', null, null, $editChoose->image);
                    } else {
                        $image = $editChoose->image;
                    }
                }
            } else {
                if ($request->file('image')) {
                    $image = $this->imageUpload($request->file('image'), 'images/choose/', null, null);
                } else {
                    $image = null;
                }
            }
            WhyChoose::updateOrCreate(['id' => $request->update_id], [
                'title'       => $request->title,
                'f_title'     => $request->f_title,
                's_title'     => $request->s_title,
                't_title'     => $request->t_title,
                'image'       => $image,
                'youtube_url' => $request->youtube_url,
                'status'      => $request->status,
            ]);
            return back()->with('success', 'Why Choose Create Or Update Successfuly !!');
        } else {
            abort(401);
        }
    }
}
