<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name','Language Name',['class' => 'control-label']) !!}
        {!! Form::text('name',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-2 col-md-2 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('written') ? 'has-error' : ''}}">
        <label class="control-label">Written</label>
        {!! Form::select('written',$quality,null, ['class' => 'form-control', 'id'=>'written','required' => true,'placeholder'=>"Skill"]) !!}
        {!! $errors->first('written', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col col-lg-2 col-md-2 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('listening') ? 'has-error' : ''}}">
        <label class="control-label">Listening</label>
        {!! Form::select('listening',$quality,null, ['class' => 'form-control', 'id'=>'listening','required' => true,'placeholder'=>"SkillHelper"]) !!}
        {!! $errors->first('listening', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col col-lg-2 col-md-2 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('spoken') ? 'has-error' : ''}}">
        <label class="control-label">Spoken</label>
        {!! Form::select('spoken',$quality,null, ['class' => 'form-control', 'id'=>'spoken','required' => true,'placeholder'=>"Skill"]) !!}
        {!! $errors->first('spoken', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-2 col-md-2 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('reading') ? 'has-error' : ''}}">
        <label class="control-label">Reading</label>
        {!! Form::select('reading',$quality,null, ['class' => 'form-control', 'id'=>'reading','required' => true,'placeholder'=>"Select Reading Skill"]) !!}
        {!! $errors->first('reading', '<p class="help-block">:message</p>') !!}
    </div>
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

