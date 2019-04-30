<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
        {!! Form::label('company_name','Company Name',['class' => 'control-label']) !!}
        {!! Form::text('company_name',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('company_business') ? 'has-error' : '' }}">
        {!! Form::label('company_business','Company Business',['class' => 'control-label']) !!}
        {!! Form::text('company_business',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('company_business', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
        {!! Form::label('designation','Designation',['class' => 'control-label']) !!}
        {!! Form::text('designation',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">
        {!! Form::label('department','Department',['class' => 'control-label']) !!}
        {!! Form::text('department',null, ['class' => 'form-control ', 'required'=>true ]) !!}
        {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
        {!! Form::label('location','Company Location',['class' => 'control-label']) !!}
        {!! Form::text('location',null, ['class' => 'form-control ', 'required'=>true ]) !!}
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
    <div class="form-date">
        <div class="form-group  {{ $errors->has('is_current') ? 'has-error' : '' }}">
            <div class="checkbox">
                <label for='is_current'>
                    {!! Form::checkbox('is_current','1', optional($experience)?optional($experience)->is_current=='0'?false:true:false, ['class' => 'required','id'=>'is_current','onclick'=>'isCurrent(this)']) !!}
                    Is current
                </label>
            </div>
            {!! $errors->first('is_current', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('responsibility') ? 'has-error' : '' }}">
        {!! Form::label('responsibility','Responsibility',['class' => 'control-label']) !!}
        {!! Form::textarea('responsibility',null, ['class' => 'form-control textarea', 'required'=>true ]) !!}
        {!! $errors->first('responsibility', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="form-group {{ $errors->has('skill_id') ? 'has-error' : ''}}">
        <label class="control-label">Skill</label>
        {!! Form::select('skill_id[]',$skills,isset($selected_skills)?$selected_skills:null, ['class' => 'form-control', 'id'=>'skill_id','required' => true,'multiple'=>true]) !!}
        {!! $errors->first('skill_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>


<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>


@push('style')
    <link href="{{url('assets/vali/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .select-custom{height: 60px!important;}
        .form-date{width: 48%; float: left; padding: 1%}
    </style>
    @endpush
@push('script')
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('assets/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#skill_id').select2({
                tags: true,
                tokenSeparators: [","],
                maximumSelectionLength: 10
            });
        });

        $(function () {
            $(".date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy'
            });
        });
        if($('input[name="is_current"]').is(':checked'))
        {
            document.getElementById("end_date").disabled = true;
        }

        function isCurrent(cb) {
            if (cb.checked == true){
                document.getElementById("end_date").value = "Continue";
                document.getElementById("end_date").disabled = true;
            } else {
                document.getElementById("end_date").value = "";
                document.getElementById("end_date").disabled = false;
            }
        }
    </script>
@endpush

