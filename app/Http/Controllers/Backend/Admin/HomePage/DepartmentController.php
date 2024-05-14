<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\DepartmentModel;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Department Section');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['doctorDepartment']       = 'active';
            $data['breadcrumb']             = ['Department' => '',];
            return view('backend.pages.doctors.department.index', $data);
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
                $getData = DepartmentModel::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('image', function ($data) {
                        return '<img class="bg-dark" id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.doctor.department.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.doctor.department.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['image','status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Department');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['doctorDepartment']       = 'active';
            $data['breadcrumb']             = ['Department' => route('admin.doctor.department.index'), 'Create Department' => '',];
            $data['totalDepartment']        = DepartmentModel::get();
            return view('backend.pages.doctors.department.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(DepartmentRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/department/', null, null);
            } else {
                $image = null;
            }
             DepartmentModel::create([
                'icon'        => $request->icon,
                'name'        => $request->name,
                'sub_name'    => $request->sub_name,
                'description' => $request->description,
                'image'       => $image,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.doctor.department.index')->with('success', 'Department Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Department');
            $data['parentDoctors']          = 'expanded';
            $data['parentDoctorsSubMenu']   = 'style="display: block;"';
            $data['doctorDepartment']       = 'active';
            $data['breadcrumb']             = ['Department' => route('admin.doctor.department.index'), 'Edit Department' => '',];
            $data['editDepartment']         = DepartmentModel::where('id', $id)->first();
            return view('backend.pages.doctors.department.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(DepartmentRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editDepartment = DepartmentModel::where('id', $request->update_id)->first();
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/department/', null, null, $editDepartment->image);
            } else {
                $image = $editDepartment->image;
            }
            $editDepartment->update([
                'icon'        => $request->icon,
                'name'        => $request->name,
                'sub_name'    => $request->sub_name,
                'description' => $request->description,
                'image'       => $image,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.doctor.department.index')->with('success', 'Department Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editDepartment = DepartmentModel::where('id', $id)->first();
            $this->imageDelete($editDepartment->image);
            $editDepartment->delete();
            return back()->with('success', 'Department Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
