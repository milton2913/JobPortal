<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
        {!! Form::label('url','Social Media URL',['class' => 'control-label']) !!}
        {!! Form::text('url',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('social_category_id') ? 'has-error' : ''}}">
        <label class="control-label">Social Media</label>
        {!! Form::select('social_category_id',$socialCategories,null, ['class' => 'form-control', 'id'=>'social_category_id','required' => true,'placeholder'=>"Select Social Media"]) !!}
        {!! $errors->first('social_category_id', '<p class="help-block">:message</p>') !!}
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
            $('#social_category_id').select2();
        });
    </script>
@endpush

