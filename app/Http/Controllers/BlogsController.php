<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Session;

class BlogsController extends Controller
{
    public function index() {
        $blogs = Blog::All();


        
        return view('admin.blog_show',['blogs' => $blogouts]);

    }
    public function show($id) {
        $blog = Blog::find($id);

        return view('admin.blog_show',['blog' => $blog]);
    }
    


    public function store(Request $request) {
        $blog = new Blog();
        $blog->title = request('title');
        $blog->author = request('author');
        $blog->body = request('body');
        
        $blog->save();
        
        return $this->index();
    }

    public function update(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->title = request('title');
        $blog->author = request('author');
        $blog->body = request('body');
        
        $blog->save();
        
        return $this->show($id);
    }
    
    public function destroy($id) 
    {
        $blog = Blog::find($id);

        if($blog){
            $blog->delete();
        }
        Session::flash('message', 'Blog deleted!');
        return view('admin.blog_index',['blogs' => Blog::All()]);
    
        
    }

}
