<div class="form-group">
    {{ Form::label('custom_'.$field->single_field_id, $field->name) }}
    {{ Form::text($field->single_field_id, '', array('id' => 'custom_'.$field->single_field_id,'class' => 'form-control')) }}
</div>