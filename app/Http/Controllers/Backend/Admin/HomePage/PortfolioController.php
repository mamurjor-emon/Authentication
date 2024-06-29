<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Models\PortfolioSection;
use App\Models\ProtfolioGallery;
use App\Models\PorfolioCategorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PortfolioRequest;
use Yajra\DataTables\Facades\DataTables;

class PortfolioController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Portfolio Section');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['portfolioActive']        = 'active';
            $data['breadcrumb']             = ['Portfolio' => '',];
            return view('backend.pages.portfolio.index', $data);
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
                $getData = PortfolioSection::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('btn_title', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('image', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                    })
                    ->addColumn('btn_title', function ($data) {
                        return $data->btn_title;
                    })
                    ->addColumn('client_name', function ($data) {
                        return $data->client_name;
                    })
                    ->addColumn('age', function ($data) {
                        return $data->age;
                    })
                    ->addColumn('phone', function ($data) {
                        return $data->phone;
                    })
                    ->addColumn('btn_url', function ($data) {
                        return $data->btn_url;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.portfolio.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.portfolio.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Portfolio');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['portfolioActive']        = 'active';
            $data['totalPortfolio']         = PortfolioSection::get();
            $data['portfolioCategories']    = PorfolioCategorie::where('status','1')->get();
            $data['breadcrumb']             = ['Portfolio' => route('admin.portfolio.index'), 'Create Portfolio' => '',];
            return view('backend.pages.portfolio.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(PortfolioRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/potfolio/', null, null);
            } else {
                $image = null;
            }
            $createProtfolio = PortfolioSection::create([
                'category_id' => $request->category_id,
                'client_name' => $request->client_name,
                'date'        => $request->date,
                'phone'       => $request->phone,
                'age'         => $request->age,
                'title'       => $request->title,
                'btn_title'   => $request->btn_title,
                'btn_url'     => $request->btn_url,
                'btn_target'  => $request->btn_target,
                'order_by'    => $request->order_by,
                'discription' => $request->discription,
                'status'      => $request->status,
                'image'       => $image,
            ]);

            if($request->portfolio_gallery != null){
                foreach($request->portfolio_gallery as $gallery){
                    $image = $this->imageUpload($gallery, 'images/potfolio/gallery/', null, null);
                    ProtfolioGallery::create([
                        'portfolio_id' => $createProtfolio->id,
                        'image'        => $image,
                    ]);
                }
            }
            return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Portfolio');
            $data['parentPortfolio']        = 'expanded';
            $data['parentPortfolioSubMenu'] = 'style="display: block;"';
            $data['portfolioActive']        = 'active';
            $data['breadcrumb']             = ['Portfolio' => route('admin.portfolio.index'), 'Edit Portfolio' => '',];
            $data['editPortfolio']          = PortfolioSection::where('id', $id)->first();
            $data['portfolioCategories']    = PorfolioCategorie::where('status','1')->get();
            $data['portfolioGallerys']      = ProtfolioGallery::where('portfolio_id',$id)->get();
            return view('backend.pages.portfolio.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(PortfolioRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editPortfolio = PortfolioSection::where('id', $request->update_id)->first();
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/potfolio/', null, null, $editPortfolio->image);
            } else {
                $image = $editPortfolio->image;
            }
            $editPortfolio->update([
                'category_id' => $request->category_id,
                'client_name' => $request->client_name,
                'date'        => $request->date,
                'phone'       => $request->phone,
                'age'         => $request->age,
                'title'       => $request->title,
                'btn_title'   => $request->btn_title,
                'btn_url'     => $request->btn_url,
                'btn_target'  => $request->btn_target,
                'order_by'    => $request->order_by,
                'discription' => $request->discription,
                'status'      => $request->status,
                'image'       => $image,
            ]);
            if($request->portfolio_gallery != null){
                foreach($request->portfolio_gallery as $gallery){
                    $image = $this->imageUpload($gallery, 'images/potfolio/gallery/', null, null);
                    ProtfolioGallery::create([
                        'portfolio_id' => $request->update_id,
                        'image'        => $image,
                    ]);
                }
            }
            return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editPortfolio = PortfolioSection::with('galleryImages')->where('id', $id)->first();
            $this->imageDelete($editPortfolio->image);
            if($editPortfolio->galleryImages != null){
                foreach ($editPortfolio->galleryImages as $key => $value) {
                    $this->imageDelete($value->image);
                }
            }
            $editPortfolio->delete();
            return back()->with('success', 'Portfolio Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galleryDelete(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request->ajax()) {
                $gallery = ProtfolioGallery::find($request->id);
                if ($gallery->image  != null) {
                    $this->imageDelete($gallery->image);
                }
                $gallery->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Gallery Image Deleted.',
                ]);
            }
        } else {
            abort(401);
        }
    }
}
