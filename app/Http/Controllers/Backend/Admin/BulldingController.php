<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BulldingRequest;
use App\Models\Bullding;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class BulldingController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Bulldings');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addBullding']            = 'active';
            $data['breadcrumb']             = ['Bulldings' => '',];
            return view('backend.pages.doctors.bullding.index', $data);
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
                $getData = Bullding::latest('id');
                return DataTables::eloquent($getData)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if (!empty($request->search)) {
                        $query->when($request->search, function ($query, $value) {
                            $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('location', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                        });
                    }
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('location', function ($data) {
                    return $data->location;
                })
                ->addColumn('image', function ($data) {
                    return '<img class="bg-dark" id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                })
                ->addColumn('status', function ($data) {
                    return status($data->status);
                })
                ->addColumn('action', function ($data) {
                    return '<div class="text-right" ><a href="' . route('admin.doctor.bullding.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                    <i class="material-icons mdc-button__icon">colorize</i>
                    </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                    <i class="material-icons mdc-button__icon">delete</i>
                </button><form action="' . route('admin.doctor.bullding.delete', ['id' => $data->id]) . '"
                id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                @csrf
                @method("DELETE") </form></div>';
                })
                ->rawColumns(['status', 'image', 'action'])
                ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Bullding');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addBullding']            = 'active';
            $data['totalBulldings']         = Bullding::get();
            $data['breadcrumb']             = ['Bullding' => route('admin.doctor.bullding.index'), 'Create Bulldings' => '',];
            return view('backend.pages.doctors.bullding.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(BulldingRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/bulldings/', null, null);
            } else {
                $image = null;
            }
            Bullding::create([
                'name'     => $request->name,
                'location' => $request->location,
                'image'    => $image,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.bullding.index')->with('success', 'Bullding Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Bullding');
            $data['parentTimeTable']        = 'expanded';
            $data['parentTimeTableSubMenu'] = 'style="display: block;"';
            $data['addBullding']            = 'active';
            $data['editBullding']           = Bullding::find($id);
            $data['breadcrumb']             = ['Rooms' => route('admin.doctor.bullding.index'), 'Edit Bullding' => '',];
            return view('backend.pages.doctors.bullding.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(BulldingRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editBullding = Bullding::find($request->update_id);
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/bulldings/', null, null, $editBullding->image);
            } else {
                $image = $editBullding->image;
            }

            $editBullding->update([
                'name'     => $request->name,
                'location' => $request->location,
                'image'    => $image,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.doctor.bullding.index')->with('success', 'Bullding Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editBullding = Bullding::find($id);
            $this->imageDelete($editBullding->image);
            $editBullding->delete();
            return back()->with('success', 'Bullding Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
