<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::label('title','certification Title',['class' => 'control-label']) !!}
        {!! Form::text('title',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
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
        {!! Form::text('location',null, ['class' => 'form-control ', 'required'=>false ]) !!}
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    {!! Form::label('start_date','Employment Period ',['class' => 'control-label']) !!}
    <br>
    <div class="form-date">
        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
            {!! Form::text('start_date',null, ['class' => 'form-control date', 'required'=>true ]) !!}
            {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-date">
        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
            {!! Form::text('end_date',null, ['class' => 'form-control date', 'id'=>'end_date', 'required'=>true ]) !!}
            {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>



@push('style')
    <link href="{{url('assets/vali/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .form-date{width: 48%; float: left; padding: 1%}
    </style>
@endpush
@push('script')
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $(".date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy'
            });
        });
    </script>
@endpush

