@extends ('layouts.index')
@section ('content')



           
echo Form::open(array('url' => 'foo/bar'));
            echo Form::text('username','Username');
            echo '<br/>';
@endsection