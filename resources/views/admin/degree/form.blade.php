<div class="form-group col-md-4 {{ $errors->has('education_level_id') ? 'has-error' : ''}}">
    <label class="control-label">Name</label>
    {!! Form::select('education_level_id',$educationLevels,null, ['class' => 'form-control select2', 'placeholder' => 'Select Education Level', 'required'=>true ]) !!}
    {!! $errors->first('education_level_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label class="control-label">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name', 'required' => 'required','placeholder'=>'Degree Name']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-4 {{ $errors->has('short_name') ? 'has-error' : ''}}">
    <label class="control-label">Short Name</label>
    {!! Form::text('short_name', null, ['class' => 'form-control',  'id'=>'slug', 'required' => 'required','placeholder'=>'Degree short name']) !!}
    {!! $errors->first('short_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-8 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label class="control-label">Description</label>
    {!! Form::textarea('description', null, ['class' => 'form-control textarea',  'id'=>'description','placeholder'=>'Description']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group  col-md-2 {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label class="control-label">Is Active</label>
    <div class="form-check">
        <label class="form-check-label">
            {{ Form::radio('is_active', 1,null,['class'=>'form-check-input']) }}
            Yes

        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            {{ Form::radio('is_active', 0,null,['class'=>'form-check-input']) }} No
        </label>
    </div>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-1 align-self-center {{ $errors->has('itemCategory') ? 'has-error' : ''}}">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')