<div class="form-group">
    {{ Form::label($name, $title, ['class' => 'control-label']) }}
    <br>
    @foreach($options as $option)
      {{ Form::radio($name, $option, $attributes)}} {{$option}}<br />
    @endforeach
</div>
