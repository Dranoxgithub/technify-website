@extends('layouts.layout')

@section('content')


<div class="wrapper">
    
<h1 class="align-center">Blog Dashboard</h1>



   


    <div class="blog">
        <div class="blog-show">
                <div class="level-right">
                    <p class="level-item">
                        <button class="tiny special"><a class="remove-blue" href="{{ route('admin.blog_edit',$blog->id)}}">Edit</a></button>
                    </p>
                    <p class="level-item">
                        <form action="{{ route('blogs.destroy', $blog->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="tiny" type="submit">Delete</button>
                        </form>
                    </p>
                    <p class="level-item">
                        <button class="tiny special"><a class="remove-blue" href="/admin/blogs">Back</a></button>
                    </p>
                </div>
            
            
    
            <div>
                <h1 id="blog-title">{{ $blog->title }}</h1>
            </div>
            <div>
                <h5>{{ $blog->author }}</h5>
            </div>
            <div>
                <h6>{!! $blog->body !!}</h6>
            </div>
            
            
            
            
        </div>
    </div>


    
</div>


@endsection







