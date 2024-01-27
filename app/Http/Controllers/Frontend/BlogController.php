<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog($id){
        $this->setPageTitle('Blog Details');
        $data['blog']       = Blog::with(['user','categorie'])->where('id',$id)->first();
        $data['categories'] = BlogCategories::where('status','1')->get();
        $data['tags']       = BlogTag::where('status','1')->get();
        $data['breadcrumb'] = ['Home' => url('/'), 'Blog Details' => ''];
        $data['resentPosts']= Blog::where('status','1')->orderBy('id','desc')->get();
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

    public function blogcomment(Request $request){
        
    }
}
