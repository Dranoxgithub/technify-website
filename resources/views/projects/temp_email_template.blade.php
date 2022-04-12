Hi {{ $student_name }},<br><br>

You have just successfully applied to Technify. Here is a copy of your profile.<br>


    <strong>{{ __('Student Name') }}: </strong> {{ $student_name }}<br>
            
    <strong>{{ __('Student Email') }}: </strong>{{ $student_email }}<br>
    <strong>{{ __('University') }}: </strong> {{ $student->school }}<br>
            
    <strong>{{ __('Role interested') }}: </strong>{{ $student->position }}<br>
            
    <strong>{{ __('Country') }}: </strong>{{ $student->country }}<br>
            
    <strong>{{ __('Timezone') }}: </strong>  {{ $student->timezone }}<br>
    <strong>{{ __('Spoken Languages') }}: </strong>{{ $student->language }}<br>

    @if ($choice_1)
    <strong>{{ __('1st Preferred Project') }}: </strong>{{ $choice_1 }}<br>
    @endif
    @if ($choice_2)
    <strong>{{ __('2nd Preferred Project') }}: </strong>{{ $choice_2 }}<br>
    @endif
    @if ($choice_3)
    <strong>{{ __('3rd Preferred Project') }}: </strong>{{ $choice_3 }}<br>
    @endif

    @if ($comments)
    <strong>{{ __('Comments') }}: </strong>{{ $comments }}<br>
    @endif

    For questions and feedback, please contact technifyinitiative@gmail.com.<br><br>

Best,<br>
Technify Team

