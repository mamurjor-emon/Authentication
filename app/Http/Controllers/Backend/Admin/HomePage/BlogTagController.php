<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogTagRequest;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class BlogTagController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Blog Tag Section');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogTag']            = 'active';
            $data['breadcrumb']         = ['Blog Tag' => '',];
            return view('backend.pages.blog-tag.index', $data);
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
                $getData = BlogTag::latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('tag_name', 'like', "%{$value}%")
                                    ->orWhere('order_by', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('tag_name', function ($data) {
                        return $data->tag_name;
                    })
                    ->addColumn('order_by', function ($data) {
                        return $data->order_by;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.blog.tags.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.blog.tags.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Blog Tag');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogTag']            = 'active';
            $data['totalTags']          = BlogTag::get();
            $data['breadcrumb']         = ['Blog Tags' => route('admin.blog.tags.index'), 'Create Blog Tag' => '',];
            return view('backend.pages.blog-tag.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(BlogTagRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            BlogTag::create([
                'tag_name'       => $request->tag_name,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.blog.tags.index')->with('success', 'Blog Tag Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Blog Tag');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['blogTag']            = 'active';
            $data['breadcrumb']         = ['Blog Tags' => route('admin.blog.tags.index'), 'Edit Blog Tag' => ''];
            $data['editBlogTag'] = BlogTag::where('id',$id)->first();
            return view('backend.pages.blog-tag.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(BlogTagRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editBlogTag = BlogTag::where('id', $request->update_id)->first();
            $editBlogTag->update([
                'tag_name'       => $request->tag_name,
                'order_by'       => $request->order_by,
                'status'         => $request->status,
            ]);
            return redirect()->route('admin.blog.tags.index')->with('success', 'Blog Tag Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editBlogTag = BlogTag::where('id', $id)->first();
            $editBlogTag->delete();
            return back()->with('success', 'Blog Tag Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
