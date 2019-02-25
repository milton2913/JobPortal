<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::label('title','reference Title',['class' => 'control-label']) !!}
        {!! Form::text('title',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
        <label class="control-label">Country</label>
        {!! Form::select('country_id',$countries,null, ['class' => 'form-control', 'id'=>'country_id','required' => true,'placeholder'=>"Select country"]) !!}
        {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
        {!! Form::label('topic','Topics Covered',['class' => 'control-label']) !!}
        {!! Form::text('topic',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('institute') ? 'has-error' : '' }}">
        {!! Form::label('institute','Institute',['class' => 'control-label']) !!}
        {!! Form::text('institute',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('institute', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
        {!! Form::label('location','Location',['class' => 'control-label']) !!}
        {!! Form::text('location',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
        {!! Form::label('duration','Duration',['class' => 'control-label']) !!}
        {!! Form::text('duration',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@php
$year = Date('Y')-70;
$years=array();
for($i=70;$i>=0;$i--){
$years[$year+$i]=$year+$i;
}
@endphp
<div class="col col-lg-2 col-md-2 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
        <label class="control-label">reference Year </label>
        {!! Form::select('year',$years,null, ['class' => 'form-control', 'id'=>'country_id','required' => true,'placeholder'=>"Select year"]) !!}
        {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
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
            $('#country_id').select2();
        });
    </script>
@endpush

