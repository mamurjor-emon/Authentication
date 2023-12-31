<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplatesController extends Controller
{
    public function index()
    {
        $this->setPageTitle('Email Templates');
        $breadcrumb = ['Dashboard' => route('admin.dashboard'), 'Email Templates' => '',];
        return view('backend.pages.email-templates.index', compact('breadcrumb'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $getData = EmailTemplate::latest('id');
            return DataTables::eloquent($getData)
                ->addIndexColumn()
                ->filter(function ($query) use ($request){
                    if (!empty($request->search)) {
                        $query->when($request->search, function($query,$value){
                            $query->whereHas('email_templates', function ($query) use ($value) {
                                $query->where('name', 'like', "%{$value}%")
                                ->orWhere('heading', 'like', "%{$value}%");
                            })
                            ->orWhere('subject', 'like', "%{$value}%");
                        });
                    }
                })
                ->addColumn('id', function($data){
                    return 'hii';
                })
                ->rawColumns([])
                ->make(true);
        }
    }
}
