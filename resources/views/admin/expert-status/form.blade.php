<div class="form-group col-md-4 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label class="control-label">Expert Status Title</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title', 'required' => 'required','placeholder'=>'Expert Status Title']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-4 {{ $errors->has('slug') ? 'has-error' : ''}}">
    <label class="control-label">Expert Status  slug/url</label>
    {!! Form::text('slug', null, ['class' => 'form-control',  'id'=>'slug', 'required' => 'required','placeholder'=>'Expert Status slug']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-1 align-self-center {{ $errors->has('itemCategory') ? 'has-error' : ''}}">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')