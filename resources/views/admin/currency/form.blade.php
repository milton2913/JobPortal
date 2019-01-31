<div class="form-group col-md-4 {{ $errors->has('country_id') ? 'has-error' : ''}}">
    <label class="control-label">Name</label>
    {!! Form::select('country_id',$countries,null, ['class' => 'form-control select2', 'placeholder' => 'Select Country', 'required'=>true ]) !!}
    {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-4 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label class="control-label">Currency Title</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title', 'required' => 'required','placeholder'=>'Currency Title']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-2 {{ $errors->has('currency_symbol') ? 'has-error' : ''}}">
    <label class="control-label">Currency  symbol </label>
    {!! Form::text('currency_symbol', null, ['class' => 'form-control',  'id'=>'slug', 'required' => 'required','placeholder'=>'Currency symbol']) !!}
    {!! $errors->first('currency_symbol', '<p class="help-block">:message</p>') !!}
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