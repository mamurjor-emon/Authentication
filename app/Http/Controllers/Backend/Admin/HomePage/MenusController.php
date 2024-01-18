<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\MenuCreateRequest;
use Yajra\DataTables\Facades\DataTables;

class MenusController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Menus');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Menus'] = 'active';
            $data['breadcrumb'] = ['Menus' => '',];
            return view('backend.pages.menus.index', $data);
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
                $getData = Menu::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('name', 'like', "%{$value}%")
                                    ->orWhere('slug', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->addColumn('slug', function ($data) {
                        return $data->slug;
                    })
                    ->addColumn('parent_menu', function ($data) {
                        return $data->parent_id;
                    })
                    ->addColumn('target', function ($data) {
                        return target($data->target);
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.menu.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="'.route('admin.menu.delete',['id' => $data->id]).'"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['target','status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Menus');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Menus'] = 'active';
            $data['parentMenu'] = Menu::where('parent_id', 0)->where('status', '1')->orderBy('id', 'desc')->get();
            $data['totalMenus'] = Menu::get();
            $data['breadcrumb'] = ['Menus' => route('admin.menu.index'), 'Create Menus' => '',];
            return view('backend.pages.menus.create', $data);
        } else {
            abort(401);
        }
    }

    public function getSubMenu(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $subMenus = Menu::where('parent_id', $request->id)->where('status', '1')->orderBy('id', 'desc')->get();
                return response()->json([
                    'success'  => 'success',
                    'data'     => $subMenus,
                ]);
            }
        } else {
            abort(401);
        }
    }
    public function store(MenuCreateRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            Menu::create([
                'name'      => $request->name,
                'slug'      => Str::slug($request->slug),
                'url'       => $request->url,
                'target'    => $request->target,
                'order_by'  => $request->order_by,
                'parent_id' => $request->parent_id ?? 0,
                'child_id'  => $request->child_id ?? 0,
                'status'    => $request->status,
            ]);
            return redirect()->route('admin.menu.index')->with('success', 'Menu Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Menus');
            $data['parentHomeMenu'] = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['Menus'] = 'active';
            $data['breadcrumb'] = ['Menus' => route('admin.menu.index'), 'Edit Menus' => '',];
            $data['parentMenu'] = Menu::where('parent_id', 0)->where('status', '1')->orderBy('id', 'desc')->get();
            $data['editMenu'] = Menu::where('id', $id)->first();
            return view('backend.pages.menus.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(MenuCreateRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $menu = Menu::where('id', $request->update_id)->first();
            $menu->update([
                'name'      => $request->name,
                'slug'      => Str::slug($request->slug),
                'url'       => $request->url,
                'target'    => $request->target,
                'order_by'  => $request->order_by,
                'parent_id' => $request->parent_id ?? 0,
                'child_id'  => $request->child_id ?? 0,
                'status'    => $request->status,
            ]);
            return redirect()->route('admin.menu.index')->with('success', 'Menu Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $menu = Menu::where('id',$id)->first();
            $menu->delete();
            return back()->with('success','Menu Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
