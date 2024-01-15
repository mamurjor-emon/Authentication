<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\FunFacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FunFactsRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class FunFactsController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Fun Facts');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Fun_facts'] = 'active';
            $data['breadcrumb'] = ['Fun Facts' => '',];
            return view('backend.pages.fun-facts.index', $data);
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
                $getData = FunFacts::latest('id');
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
                    ->addColumn('counter', function ($data) {
                        return $data->counter;
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.fun_facts.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.fun_facts.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Fun Facts');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Fun_facts'] = 'active';
            $data['totalFunFacts'] = FunFacts::get();
            $data['breadcrumb'] = ['FunFacts' => route('admin.fun_facts.index'), 'Create FunFacts' => '',];
            return view('backend.pages.fun-facts.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(FunFactsRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            FunFacts::create([
                'icons'       => $request->icons,
                'counter'    => $request->counter,
                'title'      => $request->title,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.fun_facts.index')->with('success', 'Fun Facts Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Fun Facts');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Fun_facts'] = 'active';
            $data['breadcrumb'] = ['Fun Facts' => route('admin.fun_facts.index'), 'Edit Fun Facts' => '',];
            $data['editFunFacts'] = FunFacts::where('id', $id)->first();
            return view('backend.pages.fun-facts.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(FunFactsRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editFunFacts = FunFacts::where('id', $request->update_id)->first();
            $editFunFacts->update([
                'icon'       => $request->icon,
                'counter'    => $request->counter,
                'title'      => $request->title,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.fun_facts.index')->with('success', 'Fun Facts Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editFunFacts = FunFacts::where('id', $id)->first();
            $editFunFacts->delete();
            return back()->with('success', 'Fun Facts Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
