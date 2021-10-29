<div class="form-group mb-3">
    <label for="time_to_read" class="control-label">{{ __('Time to read (minute)') }}</label>
    {!! Form::number('time_to_read', $timeToRead, ['class' => 'form-control', 'id' => 'time_to_read']) !!}
</div>

<div class="form-group mb-3">
    <label for="title_layout" class="control-label">{{ __('Layout') }}</label>
    {!! Form::customSelect('layout', get_single_layout(), $layout, ['class' => 'form-control', 'id' => 'layout']) !!}
</div>
