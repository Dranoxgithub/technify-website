Hello {{ $ngo_name }},<br><br>

{{ $student_name }} has just applied to your project "{{ $project_name }}".<br>


    <strong>{{ __('Student Name') }}: </strong> {{ $student_name }}<br>
            
    <strong>{{ __('Student Email') }}: </strong>{{ $student_email }}<br>
    <strong>{{ __('University') }}: </strong> {{ $student->school }}<br>
            
    <strong>{{ __('Role interested') }}: </strong>{{ $student->position }}<br>
            
    <strong>{{ __('Country') }}: </strong>{{ $student->country }}<br>
            
    <strong>{{ __('Timezone') }}: </strong>  {{ $student->timezone }}<br>
    <strong>{{ __('Language') }}: </strong>{{ $student->language }}<br>
    <strong>{{ __('Commitment') }}: </strong>{{ $student->min_commitment . ' - ' . $student->max_commitment . ' hours/ week'}}<br>

    <strong>The student is cc'ed here. To contact the student, please email the student at {{ $student_email }} directly.</strong><br><br>

    For questions and feedback, please contact technifyinitiative@gmail.com.<br><br>

Best,<br>
Technify Team

