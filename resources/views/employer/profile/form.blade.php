<div class="card card-default">
    <div class="card-body">
        <h2>Company Details Information</h2>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group   {{ $errors->has('company_name') ? 'has-error' : '' }}">
                    {!! Form::label('company_name',"Company Name *",['class' => 'control-label']) !!}
                    {!! Form::text('company_name',null, ['class' => 'form-control','placeholder'=>"Type Company Name"]) !!}
                    {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group   {{ $errors->has('company_name_bn') ? 'has-error' : '' }}">
                    {!! Form::label('company_name_bn',"কোম্পানির নাম (বাংলায়)",['class' => 'control-label']) !!}
                    {!! Form::text('company_name_bn',null, ['class' => 'form-control','placeholder'=>'কোম্পানির নাম বাংলায় লিখুন']) !!}
                    {!! $errors->first('company_name_bn', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="col-md-12 col-lg-12">
                <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                    {!! Form::label('country_id',"Company Address *",['class' => 'control-label']) !!}
                    {!! Form::select('country_id',$countries,null, ['class' => 'form-control', 'id'=>'country_id','required' => true,'placeholder'=>"Select Country"]) !!}
                    {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div  id="write_state" class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    {!! Form::text('state',null, ['class' => 'form-control','placeholder'=>"Type State"]) !!}
                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    {!! Form::text('city',null, ['class' => 'form-control','placeholder'=>"Type City"]) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>


        <div id="select_state" class="row" >
            <div class="col-md-4 col-lg-4">
                <div class="form-group {{ $errors->has('division_id') ? 'has-error' : ''}}">
                    {!! Form::select('division_id',$divisions,null, ['class' => 'form-control', 'id'=>'division_id','required' => false,'placeholder'=>"Select Division"]) !!}
                    {!! $errors->first('division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
                    {!! Form::select('district_id',$districts,null, ['class' => 'form-control', 'id'=>'district_id','required' => false,'placeholder'=>"Select District"]) !!}
                    {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="form-group {{ $errors->has('upazila_id') ? 'has-error' : ''}}">
                    {!! Form::select('upazila_id',$upazilas,null, ['class' => 'form-control', 'id'=>'upazila_id','required' => false,'placeholder'=>"Select Upazila"]) !!}
                    {!! $errors->first('upazila_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    {!! Form::textarea('address',null, ['class' => 'form-control textarea','placeholder'=>"Write Company Address"]) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('address_bn') ? 'has-error' : '' }}">
                    {!! Form::textarea('address_bn',null, ['class' => 'form-control textarea','placeholder'=>"কোম্পানীর ঠিকানা বাংলায় লিখুন "]) !!}
                    {!! $errors->first('address_bn', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="row" >
            <div class="col-md-12 col-lg-12">
                <div class="form-group {{ $errors->has('industry_type_id') ? 'has-error' : ''}}">
                    {!! Form::label('industry_type_id',"Industry Type *",['class' => 'control-label']) !!}
                    {!! Form::select('industry_type_id',$industry_types,null, ['class' => 'form-control', 'id'=>'industry_type_id','required' => true,'placeholder'=>"Select Industry Category"]) !!}
                    {!! $errors->first('industry_type_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="industry-list">
            @include('employer.profile.industry')
        </div>
        <div class="row" style="margin: 10px 0px">
            <div class="col-md-12" id="inList">
@if($selected_industry2)
                    @foreach($selected_industry2 as $si)

                        <span class='alert alert-dismissible alert-success' id="new{{$si->pivot->industry_id}}"><input type='hidden' name='industry_id[]' value="{{$si->pivot->industry_id}}"><button class='close' cl="{{$si->pivot->industry_id}}" type='button' data-dismiss='alert'>×</button>{{$si->title}}</span>
                        @endforeach
    @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    {!! Form::label('description',"Business Description",['class' => 'control-label']) !!}
                    {!! Form::textarea('description',null, ['class' => 'form-control textarea','placeholder'=>"Write Business Description"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('trade_license_no') ? 'has-error' : '' }}">
                    {!! Form::label('trade_license_no',"Business/ Trade License No",['class' => 'control-label']) !!}
                    {!! Form::text('trade_license_no',null, ['class' => 'form-control','placeholder'=>"Type Business/ Trade License No"]) !!}
                    {!! $errors->first('trade_license_no', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('rl_no') ? 'has-error' : '' }}">
                    {!! Form::label('rl_no',"RL No (For Recruiting Agency)",['class' => 'control-label']) !!}
                    {!! Form::text('rl_no',null, ['class' => 'form-control','placeholder'=>"Type RL No (For Recruiting Agency)"]) !!}
                    {!! $errors->first('rl_no', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group {{ $errors->has('website_url') ? 'has-error' : '' }}">
                    {!! Form::label('website_url',"Website URL",['class' => 'control-label']) !!}
                    {!! Form::text('website_url',null, ['class' => 'form-control','placeholder'=>"Type Website URL"]) !!}
                    {!! $errors->first('website_url', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

<hr>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h3>Primary Contact</h3>
            </div>
        </div>
        <div class="row">
            @if(count($contacts)>0)
            <div class="col-md-12 col-lg-12">
                <div class="form-group {{ $errors->has('employer_contact_id') ? 'has-error' : ''}}">
                    {!! Form::select('employer_contact_id',$contacts,null, ['class' => 'form-control', 'id'=>'employer_contact_id','required' => false]) !!}
                    {!! $errors->first('employer_contact_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @endif

            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_name') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_name',"Contact Person's Name *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_name',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Name",'required'=>true, count($contacts)>0?"disabled":""]) !!}
                    {!! $errors->first('contact_person_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_designation') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_designation',"Contact Person's Designation *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_designation',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Designation",'required'=>true,count($contacts)>0?"disabled":""]) !!}
                    {!! $errors->first('contact_person_designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_email') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_email',"Contact Person's Email *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_email',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Email Address",'required'=>true,count($contacts)>0?"disabled":""]) !!}
                    {!! $errors->first('contact_person_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_mobile') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_mobile',"Contact Person's Mobile",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_mobile',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Mobile Number",count($contacts)>0?"disabled":""]) !!}
                    {!! $errors->first('contact_person_mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Billing Information</h3>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
                    {!! Form::text('contact_phone',null, ['class' => 'form-control','placeholder'=>"Type Billing  Contact Phone Number"]) !!}
                    {!! $errors->first('contact_phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
                    {!! Form::text('contact_email',null, ['class' => 'form-control','placeholder'=>"Type Billing  Person's Email Address"]) !!}
                    {!! $errors->first('contact_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            {!! Form::label('company_logo',"Company Logo",['class' => 'control-label']) !!}
                <!-- image-preview-filename input [CUT FROM HERE]-->
                <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                        <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input name="company_logo" type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                    </div>
                </span>
                </div><!-- /input-group image-preview [TO HERE]-->
                <br>
                <br>
                <br>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                {!! Form::button('<i class="fa fa-plus"></i>', array('class' => 'btn btn-block btn-primary', 'type' => 'submit')) !!}
            </div>
        </div>
    </div>
</div>

@push('style')
    <style>
        #industry-list {
            max-width: 100%;
            max-height: 200px;
            padding: 3px;
            margin: auto;
            border: 2px solid #CED4DA;
            background-color: #fff;
            overflow: auto;
        }

        /*image upload css*/
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }
        .popover-body{max-width: 200px}
        .popover-body img{width: 100%}
        #inList span{ padding: 1px; margin: 3px;float: left; padding-right: 20px}
        .alert-dismissible .close{
            top: 4px;
            right: 0px;
            padding: 0px;
            z-index: 2;
            background: #707070;
            border-radius: 50%;
            height: 16px;
            width: 16px;
            font-size: 12px;
            color: white;
        }
    </style>
@endpush
@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        var country_id = $('#country_id :selected').val();
        if (country_id == 19) {
            $('#select_state').show();
        } else {
            $('#select_state').hide();
            $('#write_state').show();
        }
        // onload industry get
        var industry_type_id = $('#industry_type_id :selected').val();
        if(industry_type_id>0){
            getIndustry(industry_type_id);
        }
        var industryIds = $("#industry-list input:checkbox:checked").map(function(){
            return $(this).val();
        }).get();
/*
        if (industryIds.length>0){
            for (var i=0; i<industryIds.length; i++){
                var industryName = $('#business'+industryIds[i]).text()
                $("#inList").append("<span class='alert alert-dismissible alert-success' id='new"+industryIds[i]+"'><input type='hidden' name='industry_id[]' value="+industryIds[i]+"><button class='close' cl='"+industryIds[i]+"' type='button' data-dismiss='alert'>×</button>"+industryName+"</span>");
            }
        }
*/
    });
    $(document).on('click', '.industry', function(){
        var bid = $(this).attr("bid");
        if($(this). prop("checked") == true){
            var industryName = $('#business'+bid).text()
            $("#inList").append("<span class='alert alert-dismissible alert-success' id='new"+bid+"'><input type='hidden' name='industry_id[]' value="+bid+"><button class='close' cl='"+bid+"' type='button' data-dismiss='alert'>×</button>"+industryName+"</span>");

        }else {
            $("#new"+bid).remove();
        }
    });
    $(document).on('click', '.close', function(){
        var bid = $(this).attr("cl");
        if($("#"+bid).length){
            document.getElementById(bid).checked = false;
        }
    });

    $('#industry_type_id').on('change', function (event) {
        event.preventDefault();
        var industry_type_id = $(this).val();
            getIndustry(industry_type_id);
    });

    function getIndustry(industry_type_id){
        $.ajax({
            type: "GET",
            url: "{{url('filter-industry')}}?industry_type_id=" + industry_type_id,
            success: function (res) {
                $("#industry-list").empty();
                $("#industry-list").append(res);
            }
        });
    }
    $('#employer_contact_id').on('change', function () {
        var employer_contact_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{url('get-employer-contact')}}?employer_contact_id=" + employer_contact_id,
            success: function (res) {
                //set as  present address value in permanent address
                $('#contact_person_name').val(res['name']);
                $('#contact_person_email').val(res['email']);
                $('#contact_person_designation').val(res['designation']);
                $('#contact_person_mobile').val(res['mobile']);
               // console.log();
            }
        });
    });

    $("#write_state").hide();
    $('#country_id').change(function () {
        var country_id = $(this).val();
        if (country_id==19){
            $("#write_state").hide();
            $("#select_state").show();
            $.ajax({
                type: "GET",
                url: "{{url('get-division-list')}}?country_id=" + country_id,
                success: function (res) {
                    console.log(res);
                    if (res) {
                        $("#division_id").empty();
                        $("#division_id").append('<option value="">Select</option>');
                        $.each(res, function (key, value) {
                            $("#division_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                        $("#district_id").empty();
                        $("#upazila_id").empty();
                    }
                }
            });
        } else {
            $("#select_state").hide();
            $("#write_state").show();
        }
    });
    $('#division_id').change(function () {
        var division_id = $(this).val();
        console.log(division_id);
            $.ajax({
                type: "GET",
                url: "{{url('get-district-list')}}?division_id=" + division_id,
                success: function (res) {
                    console.log(res);
                    if (res) {
                        $("#district_id").empty();
                        $("#district_id").append('<option value="">Select</option>');
                        $.each(res, function (key, value) {
                            $("#district_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                        $("#upazila_id").empty();
                    }
                }
            });
    });
    $('#district_id').change(function () {
        var district_id = $(this).val();
        console.log(district_id);
        $.ajax({
            type: "GET",
            url: "{{url('get-upazila-list')}}?district_id=" + district_id,
            success: function (res) {
                console.log(res);
                if (res) {
                    $("#upazila_id").empty();
                    $("#upazila_id").append('<option value="">Select</option>');
                    $.each(res, function (key, value) {
                        $("#upazila_id").append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            }
        });
    });
    $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
        );
    });
    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger:'manual',
            html:true,
            title: "<strong>Company Logo</strong>"+$(closebtn)[0].outerHTML,
            content: "There's no image",
            placement:'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function(){
            $('.image-preview').attr("data-content","").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function (){
            var img = $('<img/>', {
                id: 'dynamic',
                width:250,
                height:200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>
@endpush