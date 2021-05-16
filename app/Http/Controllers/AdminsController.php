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
use App\User;
use App\Student;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user:admin');
    }
    public function getStudentsJSON(Request $request)
    {
        $students = User::with('student')->where('type', 'student')->get();
        return Response::json($students);
    }
    public function showStudents(Request $request)
    {
        return view('admin.students');
    }

    public function getStudentsResume()
    {
        $student_id = Request('student');
        $student = Student::find($student_id)->first();
        $filePath = $student->resume_url;
        // file not found
        if( ! Storage::disk()->exists($filePath) ) {
            // abort(404);
            return view('pages.noresume');
        }
        
        // $pdfContent = Storage::get($filePath);
        $pdfContent = Storage::disk()->get($filePath); 
        
        $type = Storage::disk()->mimeType($filePath); 

        return Response::make($pdfContent, 200, [
        'Content-Type'        => $type,
        'Content-Disposition' => 'inline'
        ]);
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
