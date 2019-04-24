<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Contact Person Name',['class' => 'control-label']) !!}
        {!! Form::text('name',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email','Person Email',['class' => 'control-label']) !!}
        {!! Form::email('email',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
        {!! Form::label('mobile','Person Mobile',['class' => 'control-label']) !!}
        {!! Form::text('mobile',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-3 col-md-3 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
        {!! Form::label('designation','Person Designation',['class' => 'control-label']) !!}
        {!! Form::text('designation',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-3 col-md-3 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
        {!! Form::label('username','Person Username',['class' => 'control-label']) !!}
        {!! Form::text('username',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-3 col-md-3 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label('password','Password',['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => ' form-control ', 'required'=>false ]) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group  col-md-1 {{ $errors->has('is_active') ? 'has-error' : ''}}">
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


<div class="form-group col-md-1 align-self-center">
    <label class="control-label"></label>
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>

@include('layouts.partials.form_script')


@push('style')
    <link href="{{url('assets/vali/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@push('script')
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/select2.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#written,#reading,#spoken,#listening').select2();
            $('#expert_status_id').select2();
        });
    </script>
@endpush

