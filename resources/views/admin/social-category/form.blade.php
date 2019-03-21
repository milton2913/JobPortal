<div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : ''}}">
    <label class="control-label">Social Category Title</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id'=>'name', 'required' => 'required','placeholder'=>'Social Category Title']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group col-md-4 {{ $errors->has('icon') ? 'has-error' : ''}}">
    <label class="control-label">Social Category  Icon Class (css class name)</label>
    {!! Form::text('icon', null, ['class' => 'form-control',  'id'=>'icon', 'required' => 'required','placeholder'=>'Social Category  Icon Class (css class name)']) !!}
    {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
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