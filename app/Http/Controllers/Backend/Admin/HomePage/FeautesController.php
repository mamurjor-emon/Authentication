<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeautesRequest;
use App\Models\Feautes;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class FeautesController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Feautes');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Feautes']           = 'active';
            $data['breadcrumb']        = ['Feautes' => '',];
            return view('backend.pages.feautes.index', $data);
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
                $getData = Feautes::latest('id');
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
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('icon', function ($data) {
                        return $data->icon;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.feautes.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.feautes.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Feautes');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Feautes']           = 'active';
            $data['totalFeautes']      = Feautes::get();
            $data['breadcrumb']        = ['Feautes' => route('admin.slider.index'), 'Create Feautes' => '',];
            return view('backend.pages.feautes.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(FeautesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            Feautes::create([
                'icon'       => $request->icon,
                'title'      => $request->title,
                'discrption' => $request->discrption,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.feautes.index')->with('success', 'Feautes Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Feautes');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Feautes']           = 'active';
            $data['breadcrumb']        = ['Feautes' => route('admin.feautes.index'), 'Edit Feautes' => '',];
            $data['editFeautes']       = Feautes::where('id', $id)->first();
            return view('backend.pages.feautes.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(FeautesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editFeautes = Feautes::where('id', $request->update_id)->first();
            $editFeautes->update([
                'icon'       => $request->icon,
                'title'      => $request->title,
                'discrption' => $request->discrption,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.feautes.index')->with('success', 'Feautes Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editFeautes = Feautes::where('id', $id)->first();
            $editFeautes->delete();
            return back()->with('success', 'Feautes Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
