@extends('layouts.layout')

@section('content')


<div class="wrapper">
    
<h1 class="align-center">Project Dashboard</h1>
<h2 class="align-center">{{ Auth::user()->ngo->name }}</h2>

    <?php $ngo = Auth::user()->ngo ?>
    <?php $projects = $ngo->projects ?>
   
    <div>
    <table>
      <thead>
        <tr>
          <th>Project Name</th>
          <th>Contact Person</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Action</th>
        </tr>
      </thead>

    <tbody>
    @foreach ($projects as $project)
        
        <tr>
            <td>{{ $project->name }}</td>
            <td>{{ $project->contact_name }}</td>
            <td>{{ date('d M, Y', strtotime($project->start_date)) }}</td>
            <td>{{ date('d M, Y', strtotime($project->end_date)) }}</td>
           

            <td>
                <button class="tiny special"><a class="remove-blue" href="{{ route('projects.show',$project->id)}}">Details</a></button>
            
            
                <button class="tiny special"><a class="remove-blue" href="{{ route('projects.edit',$project->id)}}">Edit</a></button>
            </td> 
            <td>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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


