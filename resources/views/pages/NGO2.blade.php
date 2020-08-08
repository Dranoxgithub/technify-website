
@extends ('layouts.index')

@section ('content')
{!! Form::model($ngo, ['action' => 'NgosController@store']) !!}
    <div class="form-group">
      {!! Form::label('name', 'NAME') !!}
      {!! Form::text('name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('website', 'Website') !!}
      {!! Form::text('website', '', ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-success" type="submit">Add the Car!</button>

{!! Form::close() !!}

@endsection


