<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Models\PorfolioCategorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProtfolioCategorieReqest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PortfolioCategorieController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Portfolio Categories Section');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['protfolioCategorie']     = 'active';
            $data['breadcrumb']             = ['Portfolio Categories' => '',];
            return view('backend.pages.portfolio.categories.index', $data);
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
                $getData = PorfolioCategorie::latest('id');
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
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.portfolio.categories.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.portfolio.categories.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Portfolio Categories');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['protfolioCategorie']     = 'active';
            $data['totalPortfolioCategorie']= PorfolioCategorie::get();
            $data['breadcrumb']             = ['Portfolio Categories' => route('admin.portfolio.categories.index'), 'Create Portfolio Categorie' => '',];
            return view('backend.pages.portfolio.categories.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(ProtfolioCategorieReqest $request)
    {
        if (Gate::allows('isAdmin')) {
            PorfolioCategorie::create([
                'name'       => $request->name,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.portfolio.categories.index')->with('success', 'Portfolio Categorie Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Categories Portfolio');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['protfolioCategorie']     = 'active';
            $data['breadcrumb']             = ['Portfolio Categories' => route('admin.portfolio.categories.index'), 'Edit Portfolio Categorie' => '',];
            $data['editPortfolioCategorie'] = PorfolioCategorie::where('id', $id)->first();
            return view('backend.pages.portfolio.categories.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(ProtfolioCategorieReqest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editPortfolio = PorfolioCategorie::where('id', $request->update_id)->first();
            $editPortfolio->update([
                'name'       => $request->name,
                'order_by'   => $request->order_by,
                'status'     => $request->status,
            ]);
            return redirect()->route('admin.portfolio.categories.index')->with('success', 'Portfolio Categorie Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editPortfolioCategorie = PorfolioCategorie::where('id', $id)->first();
            $editPortfolioCategorie->delete();
            return back()->with('success', 'Portfolio Categorie Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}

