Hi {{ $student_name }},<br><br>

You have just successfully applied to Technify. Here is a copy of your profile.<br>


    <strong>{{ __('Student Name') }}: </strong> {{ $student_name }}<br>
            
    <strong>{{ __('Student Email') }}: </strong>{{ $student_email }}<br>
    <strong>{{ __('University') }}: </strong> {{ $student->school }}<br>
            
    <strong>{{ __('Role interested') }}: </strong>{{ $student->position }}<br>
            
    <strong>{{ __('Country') }}: </strong>{{ $student->country }}<br>
            
    <strong>{{ __('Timezone') }}: </strong>  {{ $student->timezone }}<br>
    <strong>{{ __('Spoken Languages') }}: </strong>{{ $student->language }}<br>


    For questions and feedback, please contact technifyinitiative@gmail.com.<br><br>

Best,<br>
Technify Team

