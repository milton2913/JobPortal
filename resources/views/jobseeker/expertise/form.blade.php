<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('skill_id') ? 'has-error' : ''}}">
        <label class="control-label">skill</label>
        {!! Form::select('skill_id',$skills,null, ['class' => 'form-control', 'id'=>'skill_id','required' => true,'placeholder'=>"Select Skill"]) !!}
        {!! $errors->first('skill_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('expert_status_id') ? 'has-error' : ''}}">
        <label class="control-label">Expert Status </label>
        {!! Form::select('expert_status_id',$expertStatus,null, ['class' => 'form-control', 'id'=>'expert_status_id','required' => true,'placeholder'=>"Select Expert Status"]) !!}
        {!! $errors->first('expert_status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group col-md-1 align-self-center">
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
            $('#skill_id').select2();
            $('#expert_status_id').select2();
        });
    </script>
@endpush

