@extends('layouts.layout')

@section('content')


<div class="container my-4">
    
<h1 class="align-center">Student Dashboard</h1>


<table
  id="table"
  data-toggle="table"
  data-flat="true"
  data-search="true"
  data-url="students_json">
  <thead>
    <tr>
      <th data-field="name" data-sortable="true">Name</th>
      <th data-field="email" data-sortable="true">Email</th>
      <th data-field="student.position" data-sortable="true">Position</th>
      <th data-field="student.country" data-sortable="true">Country</th>
      <th data-field="student.timezone" data-sortable="true">Timezone</th>
      <th data-field="student.language" data-sortable="true">Language</th>
      <th data-field="student.id"
          data-formatter="operateFormatter">Resume</th>
    </tr>
  </thead>
</table>
    
</div>


@endsection





@section ('scripts')
<script>

  function operateFormatter(value, row, index) {
    if (value)
      return [
        '<div>',
        '<a href="view_student_resume?student=' + value + '" target="_blank">View</a>',
        '</div>',
      ].join('')
    else
        return '-'
  }

</script>

<link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>


@endsection