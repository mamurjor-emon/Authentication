<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\SocalMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocalMediaRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class SocalMediaController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Socal Media');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['socalMedia']         = 'active';
            $data['breadcrumb']         = ['Socal Media' => '',];
            return view('backend.pages.socal-media.index', $data);
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
                $getData = SocalMedia::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('icon', function ($data) {
                        return $data->icon ?? '--';
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name ?? '--';
                    })
                    ->addColumn('class', function ($data) {
                        return $data->class ?? '--';
                    })
                    ->addColumn('target', function ($data) {
                        return target($data->target);
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.socal.media.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.socal.media.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['target', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Socal Media');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['socalMedia']        = 'active';
            $data['totalSocalMedia']   = SocalMedia::get();
            $data['breadcrumb']        = ['Socal Medias' => route('admin.socal.media.index'), 'Create Socal Media' => '',];
            return view('backend.pages.socal-media.create', $data);
        } else {
            abort(401);
        }
    }

    public function store(SocalMediaRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            SocalMedia::create([
                'icon'     => $request->icon,
                'name'     => $request->name,
                'url'      => $request->url,
                'target'   => $request->target,
                'order_by' => $request->order_by,
                'status'   => $request->status,
                'class'    => $request->class,
            ]);
            return redirect()->route('admin.socal.media.index')->with('success', 'Socal Media Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Socal Media');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['socalMedia']           = 'active';
            $data['breadcrumb']        = ['Socal Medias' => route('admin.socal.media.index'), 'Edit Socal Media' => '',];
            $data['editSocalMedia']        = SocalMedia::where('id', $id)->first();
            return view('backend.pages.socal-media.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(SocalMediaRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editSocalMedia = SocalMedia::where('id', $request->update_id)->first();
            $editSocalMedia->update([
                'icon'     => $request->icon,
                'name'     => $request->name,
                'url'      => $request->url,
                'target'   => $request->target,
                'order_by' => $request->order_by,
                'status'   => $request->status,
                'class'    => $request->class,
            ]);
            return redirect()->route('admin.socal.media.index')->with('success', 'Socal Media Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editSocalMedia = SocalMedia::where('id', $id)->first();
            $editSocalMedia->delete();
            return back()->with('success', 'Socal Media Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
