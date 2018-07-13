<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::date($name, \Carbon\Carbon::now(), $attributes) }}
</div>
