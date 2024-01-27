<?php

namespace App\Http\Controllers\Backend\Admin\HomePage;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\SocalMedia;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class BlogsController extends Controller
{
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Blogs');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['singleBlog']         = 'active';
            $data['breadcrumb']         = ['Blogs' => '',];
            return view('backend.pages.blogs.index', $data);
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
                $getData = Blog::with('categorie')->latest('id');
                return DataTables::eloquent($getData)
                    ->addIndexColumn()
                    ->filter(function ($query) use ($request) {
                        if (!empty($request->search)) {
                            $query->when($request->search, function ($query, $value) {
                                $query->where('title', 'like', "%{$value}%");
                            });
                        }
                    })
                    ->addColumn('image', function ($data) {
                        return '<img id="getDataImage" src="' . asset($data->image) . '" alt="image">';
                    })
                    ->addColumn('title', function ($data) {
                        return $data->title;
                    })
                    ->addColumn('status', function ($data) {
                        return status($data->status);
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="text-right" ><a href="' . route('admin.blog.edit', ['id' => $data->id]) . '" class="rounded mdc-button mdc-button--raised icon-button filled-button--success">
                        <i class="material-icons mdc-button__icon">colorize</i>
                      </a> <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" onclick="delete_data(' . $data->id . ')">
                      <i class="material-icons mdc-button__icon">delete</i>
                    </button><form action="' . route('admin.blog.delete', ['id' => $data->id]) . '"
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
            $this->setPageTitle('Create Blog');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['singleBlog']         = 'active';
            $data['totalBlogs']         = Blog::get();
            $data['socalMedias']        = SocalMedia::where('status', '1')->get();
            $data['categories']         = BlogCategories::where('status', '1')->orderBy('id', 'asc')->get();
            $data['tags']               = BlogTag::where('status', '1')->orderBy('id', 'asc')->get();
            $data['breadcrumb']         = ['Blogs' => route('admin.blog.index'), 'Create Blog' => '',];
            return view('backend.pages.blogs.create', $data);
        } else {
            abort(401);
        }
    }


    public function store(BlogRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            // dd($request->all());
            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpload($request->file('image'), 'images/blog/', null, null);
            } else {
                $image = null;
            }

            $f_image = '';
            if ($request->file('f_image')) {
                $f_image = $this->imageUpload($request->file('f_image'), 'images/blog/', null, null);
            } else {
                $f_image = null;
            }
            $l_image = '';
            if ($request->file('l_image')) {
                $l_image = $this->imageUpload($request->file('l_image'), 'images/blog/', null, null);
            } else {
                $l_image = null;
            }
            Blog::create([
                'categorie_id'    => $request->categorie_id,
                'user_id'         => Auth::id(),
                'tag_ids'         => json_encode($request->tags),
                'image'           => $image,
                'title'           => $request->title,
                'sub_title'       => $request->sub_title,
                'f_discrption'    => $request->f_discrption,
                'f_image'         => $f_image,
                'l_image'         => $l_image,
                's_discrption'    => $request->s_discrption,
                't_discrption'    => $request->t_discrption,
                'l_discrption'    => $request->l_discrption,
                'socal_media'     => json_encode($request->socal_media),
                'tag'             => $request->tag,
                'meta_title'      => $request->meta_title,
                'meta_keyword'    => $request->meta_keyword,
                'meta_discrption' => $request->meta_discrption,
                'order_by'        => $request->order_by,
                'status'          => $request->status,
            ]);
            return redirect()->route('admin.blog.index')->with('success', 'Blog Create Successfuly Done..!');
        } else {
            abort(401);
        }
    }

    public function edit($id)
    {
        if (Gate::allows('isAdmin')) {
            $this->setPageTitle('Edit Blog');
            $data['parentBlogs']        = 'expanded';
            $data['parentBlogsSubMenu'] = 'style="display: block;"';
            $data['singleBlog']         = 'active';
            $data['socalMedias']        = SocalMedia::where('status', '1')->get();
            $data['categories']         = BlogCategories::where('status', '1')->orderBy('id', 'asc')->get();
            $data['tags']               = BlogTag::where('status', '1')->orderBy('id', 'asc')->get();
            $data['breadcrumb']         = ['Blogs' => route('admin.blog.index'), 'Edit Blog' => '',];
            $data['editBlog']           = Blog::where('id', $id)->first();
            return view('backend.pages.blogs.edit', $data);
        } else {
            abort(401);
        }
    }

    public function update(BlogRequest $request)
    {
        if (Gate::allows('isAdmin')) {
            $editBlog = Blog::where('id', $request->update_id)->first();

            $image = '';
            if ($request->file('image')) {
                $image = $this->imageUpdate($request->file('image'), 'images/blog/', null, null, $editBlog->image);
            } else {
                $image = $editBlog->image;
            }
            $f_image = '';
            if ($request->file('f_image')) {
                $f_image = $this->imageUpdate($request->file('f_image'), 'images/blog/', null, null, $editBlog->f_image);
            } else {
                $f_image = $editBlog->image;
            }
            $l_image = '';
            if ($request->file('l_image')) {
                $l_image = $this->imageUpdate($request->file('l_image'), 'images/blog/', null, null, $editBlog->l_image);
            } else {
                $l_image = $editBlog->image;
            }
            $editBlog->update([
                'categorie_id'    => $request->categorie_id,
                'tag_ids'         => json_encode($request->tags),
                'image'           => $image,
                'title'           => $request->title,
                'sub_title'       => $request->sub_title,
                'f_discrption'    => $request->f_discrption,
                'f_image'         => $f_image,
                'l_image'         => $l_image,
                's_discrption'    => $request->s_discrption,
                't_discrption'    => $request->t_discrption,
                'l_discrption'    => $request->l_discrption,
                'socal_media'     => json_encode($request->socal_media),
                'tag'             => $request->tag,
                'meta_title'      => $request->meta_title,
                'meta_keyword'    => $request->meta_keyword,
                'meta_discrption' => $request->meta_discrption,
                'order_by'        => $request->order_by,
                'status'          => $request->status,
            ]);
            return redirect()->route('admin.blog.index')->with('success', 'Blog Update Successfuly Done..!');
        } else {
            abort(401);
        }
    }
    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $editBlog = Blog::where('id', $id)->first();
            $this->imageDelete($editBlog->image);
            $this->imageDelete($editBlog->f_image);
            $this->imageDelete($editBlog->l_image);
            $editBlog->delete();
            return back()->with('success', 'Blog Delete Successfuly Done.. !');
        } else {
            abort(401);
        }
    }
}
