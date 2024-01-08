<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplatesController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Email Templates');
            $parentCompanyMenu = 'expanded';
            $parentEmailSubMenu = 'style="display: block;"';
            $emailTemplate = 'active';
            $breadcrumb = ['Email Templates' => '',];
            return view('backend.pages.email-templates.index', compact('parentCompanyMenu', 'parentEmailSubMenu', 'emailTemplate', 'breadcrumb'));
        } else {
            abort(401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $getData = EmailTemplate::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('heading', 'like', "%{$value}%")
                                    ->orWhere('subject', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('heading', function ($data) {
                        return $data->heading;
                    })
                    ->addColumn('subject', function ($data) {
                        return $data->subject;
                    })
                    ->addColumn('action', function ($data) {
                        return '<a href="' . route('admin.email.templates.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }
    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Email Template Edit');
            $parentCompanyMenu = 'expanded';
            $parentEmailSubMenu = 'style="display: block;"';
            $emailTemplate = 'active';
            $breadcrumb = ['Email Templates' => route('admin.email.templates.index'), 'Email Template Edit' => ''];
            $emailtemplate = EmailTemplate::where('id', $id)->first();
            return view('backend.pages.email-templates.edit', compact('parentCompanyMenu', 'parentEmailSubMenu', 'emailTemplate', 'breadcrumb', 'emailtemplate'));
        } else {
            abort(401);
        }
    }
}