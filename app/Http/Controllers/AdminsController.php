<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;
use Session;
use DateTimeZone;
use DateTime;
use Mail;
use App\Blog;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user:admin');
    }
    public function test(Request $request)
    {
        return redirect('/');
    }
    public function createBlog() {
        return view('admin.blog_create');
    }
    public function editBlog($id) {
        return view('admin.blog_edit', ['blog' => $blog = Blog::find($id), 
        'id' => $id]);
    }
    public function indexBlog() {
        return view('admin.blog_index',['blogs' => Blog::All()]);
    }
    public function showBlog($id) {
        return view('admin.blog_show', ['blog' => $blog = Blog::find($id)]);
    }
    public function updateBlog(Request $request, $id) {
        return app('App\Http\Controllers\BlogsController')->update($request, $id);
    }
}
