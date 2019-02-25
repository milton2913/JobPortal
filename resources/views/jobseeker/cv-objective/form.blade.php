<div class="form-group col-md-3 {{ $errors->has('title') ? 'has-error' : ''}}">
    <label class="control-label">Title of Objective</label>
    {!! Form::text('title', null, ['class' => 'form-control', 'id'=>'title', 'required' => 'required','placeholder'=>'Title of Objective']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-7 {{ $errors->has('objective') ? 'has-error' : ''}}">
    <label class="control-label">Objective</label>
    {!! Form::textarea('objective', null, ['class' => 'form-control textarea', 'id'=>'objective', 'required' => 'required','placeholder'=>'Cv Objective']) !!}
    {!! $errors->first('objective', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')


