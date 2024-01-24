<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\PricingTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PricingRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PricingController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Pricing Section');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['pricingActive']     = 'active';
            $data['breadcrumb']        = ['Pricing' => '',];
            return view('backend.pages.pricing.index', $data);
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
                $getData = PricingTable::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('title', 'like', "%{$value}%")
                                    ->orWhere('price', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('icon', function ($data) {
                        return $data->icon;
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('price', function ($data) {
                        return $data->price;
                    })
                    ->addColumn('btn_title', function ($data) {
                        return $data->btn_title;
                    })
                    ->addColumn('btn_url', function ($data) {
                        return $data->btn_url;
                    })
                    ->addColumn('btn_target', function ($data) {
                        return target($data->btn_target);
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.pricing.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.pricing.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['btn_target', 'status', 'action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Pricing');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['pricingActive']     = 'active';
            $data['totalPricing']      = PricingTable::get();
            $data['breadcrumb']        = ['Pricing' => route('admin.pricing.index'), 'Create Pricing' => '',];
            return view('backend.pages.pricing.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(PricingRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            PricingTable::create([
                'icon'        => $request->icon,
                'title'       => $request->title,
                'price'       => $request->price,
                'price_label' => $request->price_label,
                'discrption'  => $request->discrption,
                'btn_title'   => $request->btn_title,
                'btn_url'     => $request->btn_url,
                'btn_target'  => $request->btn_target,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.pricing.index')->with('success', 'Pricing Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Pricing');
            $data['parentHomeMenu']    = 'expanded';
            $data['parentHomeSubMenu'] = 'style="display: block;"';
            $data['pricingActive']     = 'active';
            $data['breadcrumb']        = ['Pricing' => route('admin.pricing.index'), 'Edit Pricing' => '',];
            $data['editPricing']       = PricingTable::where('id', $id)->first();
            return view('backend.pages.pricing.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(PricingRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editPricing = PricingTable::where('id', $request->update_id)->first();
            $editPricing->update([
                'icon'        => $request->icon,
                'title'       => $request->title,
                'price'       => $request->price,
                'price_label' => $request->price_label,
                'discrption'  => $request->discrption,
                'btn_title'   => $request->btn_title,
                'btn_url'     => $request->btn_url,
                'btn_target'  => $request->btn_target,
                'order_by'    => $request->order_by,
                'status'      => $request->status,
            ]);
            return redirect()->route('admin.pricing.index')->with('success', 'Pricing Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editPricing = PricingTable::where('id', $id)->first();
            $editPricing->delete();
            return back()->with('success', 'Pricing Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}

