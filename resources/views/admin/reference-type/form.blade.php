<div class="form-group col-md-4 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label class="control-label">Reference Type Title</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title', 'required' => 'required','placeholder'=>'Reference Type Title']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-1 align-self-center {{ $errors->has('itemCategory') ? 'has-error' : ''}}">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')