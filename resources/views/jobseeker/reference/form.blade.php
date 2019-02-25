<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Name of Person',['class' => 'control-label']) !!}
        {!! Form::text('name',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('reference_type_id') ? 'has-error' : ''}}">
        <label class="control-label">Relations</label>
        {!! Form::select('reference_type_id',$referenceTypes,null, ['class' => 'form-control', 'id'=>'reference_type_id','required' => true,'placeholder'=>"Select relation type"]) !!}
        {!! $errors->first('reference_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
        {!! Form::label('designation','Designation',['class' => 'control-label']) !!}
        {!! Form::text('designation',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('organization') ? 'has-error' : '' }}">
        {!! Form::label('organization','Organization',['class' => 'control-label']) !!}
        {!! Form::text('organization',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('organization', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
        {!! Form::label('mobile','Mobile',['class' => 'control-label']) !!}
        {!! Form::text('mobile',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('phone_office') ? 'has-error' : '' }}">
        {!! Form::label('phone_office','Phone Office',['class' => 'control-label']) !!}
        {!! Form::text('phone_office',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('phone_office', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('phone_residential') ? 'has-error' : '' }}">
        {!! Form::label('phone_residential','Phone Residential',['class' => 'control-label']) !!}
        {!! Form::text('phone_residential',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('phone_residential', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        {!! Form::label('email','Email',['class' => 'control-label']) !!}
        {!! Form::text('email',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
        {!! Form::label('address','Address',['class' => 'control-label']) !!}
        {!! Form::textarea('address',null, ['class' => 'form-control textarea ', 'required'=>false ]) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        {!! Form::label('description','Description',['class' => 'control-label']) !!}
        {!! Form::textarea('description',null, ['class' => 'form-control textarea', 'required'=>false ]) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>


@push('style')
    <link href="{{url('assets/vali/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .select-custom{height: 60px!important;}
    </style>
    @endpush
@push('script')
    <script src="{{ url('assets/vali/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#reference_type_id').select2();
        });
    </script>
@endpush

