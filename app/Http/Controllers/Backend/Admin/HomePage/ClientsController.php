<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Clients');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Clients'] = 'active';
            $data['breadcrumb'] = ['Clients' => '',];
            return view('backend.pages.clients.index', $data);
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
                $getData = Client::latest('id');
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
                        return '<div class="text-right" ><a href="' . route('admin.clients.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.clients.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Clients');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Clients'] = 'active';
            $data['totalClients'] = Client::get();
            $data['breadcrumb'] = ['Clients' => route('admin.clients.index'), 'Create Clients' => '',];
            return view('backend.pages.clients.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(ClientsRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/clients/', null, null);
            } else {
                $image = null;
            }
            Client::create([
                'name'     => $request->name,
                'image'    => $image,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.clients.index')->with('success', 'Clients Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Clients');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Clients'] = 'active';
            $data['breadcrumb'] = ['Clients' => route('admin.clients.index'), 'Edit Clients' => '',];
            $data['editClients'] = Client::where('id', $id)->first();
            return view('backend.pages.clients.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(ClientsRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editSilder = Client::where('id', $request->update_id)->first();
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/clients/', null, null, $editSilder->image);
            } else {
                $image = $editSilder->image;
            }
            $editSilder->update([
                'name'     => $request->name,
                'image'    => $image,
                'order_by' => $request->order_by,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.clients.index')->with('success', 'Clients Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editClient = Client::where('id', $id)->first();
            $this->imageDelete($editClient->image);
            $editClient->delete();
            return back()->with('success', 'Client Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
