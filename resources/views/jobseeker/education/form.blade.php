
<div class="col col-lg-6 col-md-6 col-sm-12 col-12">

    <div class="form-group {{ $errors->has('education_level_id') ? 'has-error' : ''}}">
        <label class="control-label">Education Level</label>
        {!! Form::select('education_level_id',$educationLevels,null, ['class' => 'form-control', 'id'=>'education_level_id','required' => true,'placeholder'=>"Select Education Level"]) !!}
        {!! $errors->first('education_level_id', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="form-group  {{ $errors->has('degree_id') ? 'has-error' : '' }}">
        <label class="control-label">Degree</label>
        {!! Form::select('degree_id',$degrees,null, ['id'=>'degree_id','class' => 'form-control', 'required' => true,'placeholder'=>"Select Degree"]) !!}
        {!! $errors->first('degree_id', '<p class="help-block">:message</p>') !!}
    </div>


<div class="form-group {{ $errors->has('major') ? 'has-error' : '' }}">
    {!! Form::label('major','Major',['class' => 'control-label']) !!}
            {!! Form::text('major',null, ['class' => 'form-control', 'required' => true, ]) !!}
            {!! $errors->first('major', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('institute') ? 'has-error' : '' }}">
    {!! Form::label('institute','Institute',['class' => 'control-label']) !!}
            {!! Form::text('institute',null, ['class' => 'form-control', 'required' => true, ]) !!}
            {!! $errors->first('institute', '<p class="help-block">:message</p>') !!}
</div>


    <div class="form-group  {{ $errors->has('is_foreign_institute') ? 'has-error' : '' }}">

        <div class="checkbox">
            <label for='is_foreign_institute_1'>
                {!! Form::checkbox('is_foreign_institute', '1',optional($educations)?optional($educations)->is_foreign_institute==1?true:null:null, ['class' => 'required' ]) !!}
                Is Foreign Institute
            </label>
        </div>

        {!! $errors->first('is_foreign_institute', '<p class="help-block">:message</p>') !!}
    </div>
<div class="form-group  {{ $errors->has('achievement') ? 'has-error' : '' }}">
    {!! Form::label('achievement','Achievement',['class' => 'control-label']) !!}
            {!! Form::text('achievement',null, ['class' => 'form-control', ]) !!}


            {!! $errors->first('achievement', '<p class="help-block">:message</p>') !!}
</div>
</div>
    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">

<div class="form-group {{ $errors->has('result_type_id') ? 'has-error' : '' }}">
    <label class="control-label">Result Type</label>
            {!! Form::select('result_type_id',$resultTypes,null, ['class' => 'form-control', 'id'=>'result_type_id', 'required' => true,'placeholder'=>"Select Result Type"]) !!}
            {!! $errors->first('result_type_id', '<p class="help-block">:message</p>') !!}
</div>

        <div class="form-group is_hide {{ $errors->has('is_hide') ? 'has-error' : '' }}">

            <div class="checkbox">
                <label for='is_hide'>
                    {!! Form::checkbox('is_hide', '1',optional($educations)?optional($educations)->is_hide==1?true:null:null, ['id' => 'is_hide', 'class' => 'is-hide', ]) !!}
                    Is Hide
                </label>
            </div>
            {!! $errors->first('is_hide', '<p class="help-block">:message</p>') !!}
        </div>

<div class="form-group  is_mark {{ $errors->has('mark') ? 'has-error' : '' }}">
    {!! Form::label('mark','Mark',['class' => 'control-label']) !!}
            {!! Form::text('mark',null, ['class' => 'form-control ', 'id'=>'mark' ]) !!}


            {!! $errors->first('mark', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group is_grade  {{ $errors->has('cgpa') ? 'has-error' : '' }}">
    {!! Form::label('cgpa','Cgpa',['class' => 'control-label']) !!}
            {!! Form::text('cgpa',null, ['class' => 'form-control','id'=>'cgpa' ]) !!}


            {!! $errors->first('cgpa', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group is_grade  {{ $errors->has('scale') ? 'has-error' : '' }}">
    {!! Form::label('scale','Scale',['class' => 'control-label ']) !!}
            {!! Form::text('scale',null, ['class' => 'form-control','id'=>'scale' ]) !!}


            {!! $errors->first('scale', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
    {!! Form::label('year','Year',['class' => 'control-label']) !!}
            {!! Form::text('year',null, ['class' => 'form-control', 'required' => true, ]) !!}


            {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
    {!! Form::label('duration','Duration',['class' => 'control-label']) !!}
            {!! Form::text('duration',null, ['class' => 'form-control', ]) !!}


            {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
</div>

</div>
<div class="form-group col-md-1 align-self-center">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{$text}}</button>
</div>


@push('style')
    <link href="{{url('assets/vali/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .select-custom{height: 60px!important;}
.is_hide{display: none;}
.is_grade{display: none;}
.is_mark{display: none;}
    </style>
    @endpush
@push('script')
    <script src="{{ url('assets/vali/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#degree_id').select2({
                tags: true,
                tokenSeparators: [","],
            });
            $('#education_level_id').select2();
            $('#result_type_id').select2();

        });
        //present country  on change call division
        $('#education_level_id').change(function(){
            var education_level_id = $(this).val();
            if(education_level_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-degree-list')}}?education_level_id="+education_level_id,
                    success:function(res){
                        if(res){
                            $("#degree_id").empty();
                            $("#degree_id").append('<option>Select Degree</option>');
                            $.each(res,function(key,value){
                                $("#degree_id").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    }
                });
            }
        });
        $('#result_type_id').change(function() {
            var result_type_id = $(this).val();
            console.log(result_type_id);
            if (result_type_id==1||result_type_id==2||result_type_id==3||result_type_id==4) {
                if (result_type_id==1||result_type_id==2||result_type_id==3){
                    $(".is_hide").show();
                    $(".is_mark").show();
                    $(".is_grade").hide();
                    $('#cgpa').val('');
                    $('#scale').val('');
                }else {
                    $(".is_hide").show();
                    $(".is_mark").hide();
                    $(".is_grade").show();
                    $('#mark').val('');
                }
            }else {
                $(".is_hide").hide();
                $(".is_mark").hide();
                $(".is_grade").hide();
                $('#cgpa').val('');
                $('#scale').val('');
                $('#mark').val('');
            }

        });

        $(document).ready(function () {
            var result_type_id = $('#result_type_id :selected').val();
            console.log(result_type_id);
            if (result_type_id==1||result_type_id==2||result_type_id==3||result_type_id==4) {
                if (result_type_id==1||result_type_id==2||result_type_id==3){
                    $(".is_hide").show();
                    $(".is_mark").show();
                    $(".is_grade").hide();
                }else {
                    $(".is_hide").show();
                    $(".is_mark").hide();
                    $(".is_grade").show();
                }
            }
        });

/*
        $("select[name='result_type_id']").change(function(){
            var result_type_id = $(this).val();
            if (result_type_id==1||result_type_id==2||result_type_id==3||result_type_id==4) {
                $(".un-visible0").show();
                if (result_type_id==1||result_type_id==2||result_type_id==3){
                    $(".un-visible").show();
                    $(".un-visible2").hide();
                    document.getElementById("cgpa").value = "";
                    document.getElementById("scale").value = "";
                    document.getElementById('clearme').value= " "
                }else if(result_type_id==4){
                    $(".un-visible").hide();
                    $(".un-visible2").show();
                    document.getElementById("mark").value = "";
                }
            }else {
                $(".un-visible0").hide();
                $(".un-visible").hide();
                $(".un-visible2").hide();
                document.getElementById("cgpa").value = "";
                document.getElementById("scale").value = "";
                document.getElementById("mark").value = "";
            }
        });

        $(document).ready(function () {
            var result_type_id = $('#result_type_id :selected').val();
            if (result_type_id==1||result_type_id==2||result_type_id==3||result_type_id==4) {
                $(".un-visible0").show();
                if (result_type_id==1||result_type_id==2||result_type_id==3){
                    $(".un-visible").show();
                }else if(result_type_id==4){
                    $(".un-visible2").show();
                }
            }
        });

* */

    </script>
@endpush

