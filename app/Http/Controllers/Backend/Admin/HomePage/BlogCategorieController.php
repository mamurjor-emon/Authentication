<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoriesRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class BlogCategorieController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Blog Categories Section');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogCategorie']      = 'active';
            $data['breadcrumb']         = ['Blog Categories' => '',];
            return view('backend.pages.blog-categories.index', $data);
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
                $getData = BlogCategories::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('categorie_name', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('categorie_name', function ($data) {
                        return $data->categorie_name;
                    })
                    ->addColumn('order_by', function ($data) {
                        return $data->order_by;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.blog.categories.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.blog.categories.delete', ['id' => $data->id]) . '"
                    id="delete-form-' . $data->id . '" method="DELETE" class="d-none">
                    @csrf
                    @method("DELETE") </form></div>';
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
            }
        } else {
            abort(401);
        }
    }

    public function create()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Create Blog Categories');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogCategorie']      = 'active';
            $data['totalCategories']    = BlogCategories::get();
            $data['breadcrumb']         = ['Blog Categories' => route('admin.blog.categories.index'), 'Create Blog Categories' => '',];
            return view('backend.pages.blog-categories.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(BlogCategoriesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            BlogCategories::create([
                'categorie_name' => $request->categorie_name,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.blog.categories.index')->with('success', 'Blog Categorie Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Blog Categories');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogCategorie']      = 'active';
            $data['breadcrumb']         = ['Blog Categories' => route('admin.blog.categories.index'), 'Edit Blog Categories' => ''];
            $data['editBlogCategories'] = BlogCategories::where('id',$id)->first();
            return view('backend.pages.blog-categories.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(BlogCategoriesRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editBlogCategorie = BlogCategories::where('id', $request->update_id)->first();
            $editBlogCategorie->update([
                'categorie_name' => $request->categorie_name,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.blog.categories.index')->with('success', 'Blog Categorie Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editBlogCategories = BlogCategories::where('id', $id)->first();
            $editBlogCategories->delete();
            return back()->with('success', 'Blog Categorie Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
