@extends('layouts.layout')

@section('content')


<div class="wrapper">
    
<h1 class="align-center">Blog Dashboard</h1>


   
    <div>
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Body</th>
        </tr>
      </thead>

    <tbody>
    @foreach ($blogs as $blog)
        
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author }}</td>
            <td>{!! substr($blog->body, 0, 50) !!}{{ strlen($blog->body) > 50 ? "..." : ""}}</td>
           

            <td>
                <button class="tiny special"><a class="remove-blue" href="{{ route('admin.blog_show',$blog->id) }}">Details</a></button>
            
            
                <button class="tiny special"><a class="remove-blue" href="{{ route('admin.blog_edit',$blog->id)}}">Edit</a></button>
            </td> 
            <td>
                <form action="{{ route('blogs.destroy', $blog->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="tiny" type="submit">Delete</button>
                </form>
            </td>
            
            
        </tr>
    @endforeach
        
          
        
      </tbody>
    </table>
    </div>

    
</div>


@endsection





