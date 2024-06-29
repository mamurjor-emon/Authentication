<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Services Section');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['servicesActive']    = 'active';
            $data['breadcrumb']        = ['Services' => '',];
            return view('backend.pages.services.index', $data);
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
                $getData = Service::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('title', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('icon', function ($data) {
                        return $data->icon;
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('fimage', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->fimage) . '" alt="image">';
                    })
                    ->addColumn('simage', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->simage) . '" alt="image">';
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.services.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.services.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['name', 'fimage','simage','status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Service');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['servicesActive']    = 'active';
            $data['totalService']      = Service::get();
            $data['breadcrumb']        = ['Service' => route('admin.services.index'), 'Create Service' => '',];
            return view('backend.pages.services.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(ServicesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $fimage = '';
            if ($request->file('fimage')) {
                $fimage = $this->imageUpload($request->file('fimage'), 'images/service/', null, null);
            } else {
                $fimage = null;
            }

            $simage = '';
            if ($request->file('simage')) {
                $simage = $this->imageUpload($request->file('simage'), 'images/service/', null, null);
            } else {
                $simage = null;
            }

            Service::create([
                'icon'              => $request->icon,
                'name'              => $request->name,
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'fimage'            => $fimage,
                'special_text'      => $request->special_text,
                'fdescription'      => $request->fdescription,
                'simage'            => $simage,
                'heading'           => $request->heading,
                'sdescription'      => $request->sdescription,
                'tdescription'      => $request->tdescription,
                'order_by'          => $request->order_by,
                'status'            => $request->status,
            ]);
            return redirect()->route('admin.services.index')->with('success', 'Service Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Service');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['servicesActive']    = 'active';
            $data['breadcrumb']        = ['Service' => route('admin.services.index'), 'Edit Service' => '',];
            $data['editService']       = Service::where('id', $id)->first();
            return view('backend.pages.services.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(ServicesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editService = Service::where('id', $request->update_id)->first();
            $fimage = '';
            if ($request->file('fimage')) {
                $fimage = $this->imageUpdate($request->file('fimage'), 'images/service/', null, null,$editService->fimage);
            } else {
                $fimage = $editService->fimage;
            }

            $simage = '';
            if ($request->file('simage')) {
                $simage = $this->imageUpdate($request->file('simage'), 'images/service/', null, null, $editService->simage);
            } else {
                $simage = $editService->simage;
            }
            $editService->update([
                'icon'              => $request->icon,
                'name'              => $request->name,
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'fimage'            => $fimage,
                'special_text'      => $request->special_text,
                'fdescription'      => $request->fdescription,
                'simage'            => $simage,
                'heading'           => $request->heading,
                'sdescription'      => $request->sdescription,
                'tdescription'      => $request->tdescription,
                'order_by'          => $request->order_by,
                'status'            => $request->status,
            ]);
            return redirect()->route('admin.services.index')->with('success', 'Service Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editService = Service::where('id', $id)->first();
            $this->imageDelete($editService->fimage);
            $this->imageDelete($editService->simage);
            $editService->delete();
            return back()->with('success', 'Service Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
