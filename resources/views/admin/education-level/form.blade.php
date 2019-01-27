<div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label class="control-label">Education Level Title</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'title', 'required' => 'required','placeholder'=>'Education Level']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-4 {{ $errors->has('short_name') ? 'has-error' : ''}}">
    <label class="control-label">Education Level  slug/url</label>
    {!! Form::text('short_name', null, ['class' => 'form-control',  'id'=>'slug', 'required' => 'required','placeholder'=>'Education Level slug']) !!}
    {!! $errors->first('short_name', '<p class="help-block">:message</p>') !!}
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

<div class="form-group col-md-8 {{ $errors->has('description') ? 'has-error' : ''}}">
    <label class="control-label">Education Level Description</label>
    {!! Form::textarea('description', null, ['class' => 'form-control textarea', 'id'=>'title', 'required' => false]) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')