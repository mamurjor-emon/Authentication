<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCommentRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog($id){
        $this->setPageTitle('Blog Details');
        $data['blog']         = Blog::with(['user','categorie'])->where('id',$id)->first();
        $data['categories']   = BlogCategories::where('status','1')->get();
        $data['tags']         = BlogTag::where('status','1')->get();
        $data['breadcrumb']   = ['Home' => url('/'), 'Blog Details' => ''];
        $data['resentPosts']  = Blog::where('status','1')->orderBy('id','desc')->get();
        $data['blogComments'] = BlogComment::with(['user','replayComment'])->where('blog_id',$id)->where('comment_id',null)->get();
        return view('frontend.pages.blog.blog-view',$data);
    }
    public function viewCount(Request $request){
        if($request->ajax()){
            $blog = Blog::where('id',$request->blog_id)->first();
            $blog->update([
                'total_view' => $blog->total_view + 1,
            ]);
        }
    }

    public function blogComment(BlogCommentRequest $request){
        BlogComment::create([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);
        return back()->with('success','Comment Successfuly');
    }

    public function blogCommentRepay(BlogCommentRequest $request){
        BlogComment::create([
            'blog_id'        => $request->blog_id,
            'user_id'        => Auth::id(),
            'comment_id'     => $request->comment_id,
            'replay_comment' => $request->comment,
        ]);
        return back()->with('success','Comment Repay Successfuly');
    }

    public function categorieBlog($id){
        $this->setPageTitle('Categorie Blog');
        $data['blogs']        = Blog::with(['user','categorie'])->where('categorie_id',$id)->get();
        $data['categories']   = BlogCategories::where('status','1')->get();
        $data['breadcrumb']   = ['Home' => url('/'), 'Categorie Blog' => ''];
        $data['resentPosts']  = Blog::where('status','1')->orderBy('id','desc')->get();
        return view('frontend.pages.blog.categorie-blog',$data);
    }
}
