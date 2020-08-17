Hello {{ $student_name }},<br><br>

You just applied to "{{ $project->name }}" on Technify.<br><br>
Your Profile<br><br>


    <strong>{{ __('Student Name') }}: </strong> {{ $student_name }}<br>
            
    <strong>{{ __('Student Email') }}: </strong>{{ $student_email }}<br>
    <strong>{{ __('University') }}: </strong> {{ $student->school }}<br>
            
    <strong>{{ __('Role interested') }}: </strong>{{ $student->position }}<br>
            
    <strong>{{ __('Country') }}: </strong>{{ $student->country }}<br>
            
    <strong>{{ __('Timezone') }}: </strong>  {{ $student->timezone }}<br>
    <strong>{{ __('Language') }}: </strong>{{ $student->language }}<br>
    <strong>{{ __('Commitment') }}: </strong>{{ $student->min_commitment . ' - ' . $student->max_commitment . ' hours/ week'}}<br>

<br><br>
Project Details<br><br>
    <strong>{{ __('NGO Name') }}: </strong> {{ $ngo->name }}<br>
    <strong>{{ __('NGO Causes') }}: </strong> {{ $ngo->cause }}<br>
    <strong>{{ __('Project Name') }}: </strong> {{ $project->name }}<br>
    <strong>{{ __('Project Goal') }}: </strong> {{ $project->goal }}<br>    
    <strong>{{ __('Weekly Commitment') }}: </strong> {{ $project->commitment }} hours/ week<br>    
    <strong>{{ __('Project Start Date') }}: </strong> {{ $project->start_date }} <br>   
    <strong>{{ __('Project End Date') }}: </strong> {{ $project->commitment }}' hours/ week<br>   
    <strong>{{ __('Country') }}: </strong>{{ $project->country }}<br>
    <strong>{{ __('Timezone') }}: </strong> {{ $project->timezone }}<br>
            
    <strong>{{ __('Description') }}: </strong>{{ $project->description }}<br><br>
            
    

    <div class="align-center sm-hidden">
        <embed
        src="{{ action('StudentsController@getResume') }}"
        style="width:600px; height:500px;"
        frameborder="0"
        alt="resume in pdf">
    </div>


    For questions and feedback, please contact technifyinitiative@gmail.com.<br><br>

Best,<br>
Technify Team

