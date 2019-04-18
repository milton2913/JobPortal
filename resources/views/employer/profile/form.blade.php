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
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_name') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_name',"Contact Person's Name *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_name',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Name",'required'=>true]) !!}
                    {!! $errors->first('contact_person_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_designation') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_designation',"Contact Person's Designation *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_designation',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Designation",'required'=>true]) !!}
                    {!! $errors->first('contact_person_designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_mobile') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_mobile',"Contact Person's Email *",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_mobile',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Mobile Number",'required'=>true]) !!}
                    {!! $errors->first('contact_person_mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('contact_person_email') ? 'has-error' : '' }}">
                    {!! Form::label('contact_person_email',"Contact Person's Mobile",['class' => 'control-label']) !!}
                    {!! Form::text('contact_person_email',null, ['class' => 'form-control','placeholder'=>"Type Contact Person Email Address"]) !!}
                    {!! $errors->first('contact_person_email', '<p class="help-block">:message</p>') !!}
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
    </style>
@endpush
@push('script')
<script type="text/javascript">
    $("#write_state").hide();
    $('#industry_type_id').on('change', function () {
        var industry_type_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{url('filter-industry')}}?industry_type_id=" + industry_type_id,
                success: function (res) {
                    $("#industry-list").empty();
                    $("#industry-list").append(res);
                }
            });
    });

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
                        $("#division_id").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#division_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                        //custom
                        $("#district_id").empty();
                        $("#upazila_id").empty();
                        //custom
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
                        $("#district_id").append('<option>Select</option>');
                        $.each(res, function (key, value) {
                            $("#district_id").append('<option value="' + key + '">' + value + '</option>');
                        });
                        //custom
                        $("#upazila_id").empty();
                        //custom
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
                    $("#upazila_id").append('<option>Select</option>');
                    $.each(res, function (key, value) {
                        $("#upazila_id").append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            }
        });
    });
</script>

@endpush