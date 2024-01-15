<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TitleDiscriptionRequest;
use App\Models\TitleDiscrption;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class TitleDiscriptionController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Title & Discription');
            $data['parentTitle'] = 'expanded';
            $data['parentTitleSubMenu'] = 'style="display: block;"';
            $data['TitleDiscription'] = 'active';
            $data['breadcrumb'] = ['Title & Discription' => '',];
            return view('backend.pages.title-discrption.index', $data);
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
                $getData = TitleDiscrption::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('section_name', 'like', "%{$value}%")
                                    ->orWhere('title', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->section_name;
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.title.discription.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.title.discription.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Title & Discription');
            $data['parentTitle'] = 'expanded';
            $data['parentTitleSubMenu'] = 'style="display: block;"';
            $data['TitleDiscription'] = 'active';
            $data['breadcrumb'] = ['Title & Discription' => route('admin.title.discription.index'), 'Create Title & Discription' => '',];
            return view('backend.pages.title-discrption.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(TitleDiscriptionRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            TitleDiscrption::create([
                'section_name' => $request->name,
                'title'        => $request->title,
                'discrption'   => $request->discrption,
                'status'       => $request->status,
            ]);
            return redirect()->route('admin.title.discription.index')->with('success', 'Title Discription Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Title & Discription');
            $data['parentTitle'] = 'expanded';
            $data['parentTitleSubMenu'] = 'style="display: block;"';
            $data['TitleDiscription'] = 'active';
            $data['breadcrumb'] = ['Title & Discription' => route('admin.title.discription.index'), 'Edit Title & Discription' => ''];
            $data['editTitleDiscription'] = TitleDiscrption::where('id',$id)->first();
            return view('backend.pages.title-discrption.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(TitleDiscriptionRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editTitleDiscription = TitleDiscrption::where('id', $request->update_id)->first();
            $editTitleDiscription->update([
                'section_name' => $request->name,
                'title'        => $request->title,
                'discrption'   => $request->discrption,
                'status'       => $request->status,
            ]);
            return redirect()->route('admin.title.discription.index')->with('success', 'Title Discription Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editTitleDiscription = TitleDiscrption::where('id', $id)->first();
            $editTitleDiscription->delete();
            return back()->with('success', 'Title Discription Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
