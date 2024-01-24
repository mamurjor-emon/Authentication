<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SilderRequest;
use App\Models\SilderSection;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class SilderController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Silders');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Silders']           = 'active';
            $data['breadcrumb']        = ['Silders' => '',];
            return view('backend.pages.slider.index', $data);
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
                $getData = SilderSection::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('f_btn_title', 'like', "%{$value}%")
                                    ->orWhere('l_btn_title', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('f_btn_title', function ($data) {
                        return $data->f_btn_title;
                    })
                    ->addColumn('l_btn_title', function ($data) {
                        return $data->l_btn_title;
                    })
                    ->addColumn('image', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.slider.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.slider.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['image', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Silders');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Silders']           = 'active';
            $data['totalSilders']      = SilderSection::get();
            $data['breadcrumb']        = ['Silders' => route('admin.slider.index'), 'Create Silders' => '',];
            return view('backend.pages.slider.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(SilderRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/silders/', null, null);
            } else {
                $image = null;
            }
            SilderSection::create([
                'f_title'        => $request->f_title,
                'f_spcial_title' => $request->f_spcial_title,
                'l_title'        => $request->l_title,
                'l_spcial_title' => $request->l_spcial_title,
                'description'    => $request->description,
                'f_btn_title'    => $request->f_btn_title,
                'f_btn_url'      => $request->f_btn_url,
                'f_btn_target'   => $request->f_btn_target,
                'l_btn_title'    => $request->l_btn_title,
                'l_btn_url'      => $request->l_btn_url,
                'l_btn_target'   => $request->l_btn_target,
                'image'          => $image,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.slider.index')->with('success', 'Silder Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Silders');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Silders']           = 'active';
            $data['breadcrumb']        = ['Silders' => route('admin.slider.index'), 'Edit Silders' => '',];
            $data['editSilder']        = SilderSection::where('id', $id)->first();
            return view('backend.pages.slider.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(SilderRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editSilder = SilderSection::where('id', $request->update_id)->first();

            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/silders/', null, null, $editSilder->image);
            } else {
                $image = $editSilder->image;
            }
            $editSilder->update([
                'f_title'        => $request->f_title,
                'f_spcial_title' => $request->f_spcial_title,
                'l_title'        => $request->l_title,
                'l_spcial_title' => $request->l_spcial_title,
                'description'    => $request->description,
                'f_btn_title'    => $request->f_btn_title,
                'f_btn_url'      => $request->f_btn_url,
                'f_btn_target'   => $request->f_btn_target,
                'l_btn_title'    => $request->l_btn_title,
                'l_btn_url'      => $request->l_btn_url,
                'l_btn_target'   => $request->l_btn_target,
                'image'          => $image,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.slider.index')->with('success', 'Silder Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editSilder = SilderSection::where('id', $id)->first();
            $this->imageDelete($editSilder->image);
            $editSilder->delete();
            return back()->with('success', 'Silder Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
