<div class="card card-default">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12"><h5>Personal Details</h5></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="control-label">Full Name</label>
                            {{Form::text('name', optional($user)->name?optional($user)->name:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            {{Form::email('email', optional($user)->email?optional($user)->email:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>50, 'required'=>true, 'placeholder'=>"",optional($user)->email?'disabled':null])}}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="control-label">Mobile</label>
                            {{Form::number('mobile', optional($user)->mobile?optional($user)->mobile:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>15, 'required'=>true, 'placeholder'=>"",optional($user)->mobile?'disabled':null])}}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                </div>
                <div class="row">
                    @php
                        $genders = ['Male'=>'Male','Female'=>'Female','Others'=>'Others'];
                        $marital_status = ['Single'=>'Single','Married'=>'Married','Others'=>'Others'];
                        $religions = ['Islam'=>'Islam','Christianity'=>'Christianity','Judaism'=>'Judaism','Hinduism'=>'Hinduism','Buddhism'=>'Buddhism','Others'=>'Others'];
                        $identity_types = ['National ID'=>'National ID','Birth Certificate'=>'Birth Certificate','Passport'=>'Passport'];
                        $bloods = ['A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','O+'=>'O+','O-'=>'O-','AB+'=>'AB+','AB-'=>'AB-'];
                    @endphp
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label for="gender" class="control-label">Gender</label>
                            {!! Form::select('gender', $genders,optional($user->profile)->gender?optional($user->profile)->gender:null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                            <label for="marital_status" class="control-label">Marital Status</label>
                            {!! Form::select('marital_status', $marital_status,optional($user->profile)->marital_status?optional($user->profile)->marital_status:null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                            <label for="religion" class="control-label">Religion</label>
                            {!! Form::select('religion', $religions,optional($user->profile)->religion?optional($user->profile)->religion:null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('blood') ? 'has-error' : '' }}">
                            <label for="blood" class="control-label">Blood Group</label>
                            {!! Form::select('blood', $bloods,optional($user->profile)->blood?optional($user->profile)->blood:null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
                            <label for="nationality" class="control-label">Nationality</label>
                            {!! Form::select('nationality', $nationality,optional($user->profile)->country_id?optional($user->profile)->country_id:null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Date Of Birth</label>
                            <div class="input-group date">
                                {!! Form::text('dob',optional($user->profile)->dob?optional($user->profile)->dob:null,['class'=>'form-control','required'=>true]) !!}
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-3">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg"/>
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url({{Skill::getAvatar()}});">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('father_name') ? 'has-error' : '' }}">
                    <label for="father_name" class="control-label">Father Name</label>
                    {{Form::text('father_name', optional($user->profile)->father_name?optional($user->profile)->father_name:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                    <label for="mother_name" class="control-label">Mother Name</label>
                    {{Form::text('mother_name', optional($user->profile)->mother_name?optional($user->profile)->mother_name:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('alternate_email') ? 'has-error' : '' }}">
                    <label for="alternate_email" class="control-label">Alternate Email</label>
                    {{Form::text('alternate_email', optional($user->profile)->alternate_email?optional($user->profile)->alternate_email:null,  ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'placeholder'=>""])}}
                    {!! $errors->first('alternate_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('alternate_mobile') ? 'has-error' : '' }}">
                    <label for="alternate_mobile" class="control-label">Alternate Mobile</label>
                    {{Form::text('alternate_mobile', optional($user->profile)->alternate_mobile?optional($user->profile)->alternate_mobile:null,  ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'placeholder'=>""])}}
                    {!! $errors->first('alternate_mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Identity</h5></div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('identity_type') ? 'has-error' : '' }}">
                    <label for="identity_type" class="control-label">Identity Type</label>
                    {!! Form::select('identity_type', $identity_types,optional($user->profile)->identity_type?optional($user->profile)->identity_type:null, ['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('identity_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('identity_no') ? 'has-error' : '' }}">
                    <label for="identity_no" class="control-label">Identity No.</label>
                    {{Form::text('identity_no', optional($user->profile)->identity_no?optional($user->profile)->identity_no:null,  ['class' => 'form-control','minlength'=>1, 'maxlength'=>30,'placeholder'=>""])}}
                    {!! $errors->first('identity_no', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="present_address_area">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Present Address</h5>
                <div class="form-group">
                    {{Form::radio('present_address', 1, optional(Skill::presentAddress())->in_bangladesh==1?"checked":false,['id'=>'pa1'])}}
                    Inside Bangladesh
                    {{Form::radio('present_address', 0, optional(Skill::presentAddress())->in_bangladesh==0?"checked":false,['id'=>'pa2'])}}
                    Outside Bangladesh
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_country_id') ? 'has-error' : '' }}">
                    <label for="present_country_id" class="control-label">Country</label>
                    {!! Form::select('present_country_id', $countries,optional(Skill::presentAddress())?optional(Skill::presentAddress())->id:null,['class'=>'custom-select mb-3','placeholder'=>" ",'id'=>'present_country_id']) !!}
                    {!! $errors->first('present_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_division_id') ? 'has-error' : '' }}">
                    <label for="present_division_id" class="control-label">Division</label>
                    {!! Form::select('present_division_id', $divisions,optional(Skill::presentAddress())?optional(Skill::presentAddress())->division_id:null,['class'=>'custom-select mb-3 present_out','placeholder'=>" ",'id'=>'present_division_id']) !!}
                    {!! $errors->first('present_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : '' }}">
                    <label for="present_district_id" class="control-label">District</label>
                    {!! Form::select('present_district_id', $districts,optional(Skill::presentAddress())?optional(Skill::presentAddress())->district_id:null,['class'=>'custom-select mb-3 present_out','placeholder'=>" ",'id'=>'present_district_id']) !!}
                    {!! $errors->first('present_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_thana_id') ? 'has-error' : '' }}">
                    <label for="present_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('present_thana_id', $upazilas,optional(Skill::presentAddress())?optional(Skill::presentAddress())->upazila_id:null,['class'=>'custom-select mb-3 present_out','placeholder'=>" ",'id'=>'present_thana_id']) !!}
                    {!! $errors->first('present_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('presentAddress') ? 'has-error' : '' }}">
                    {{Form::textarea('presentAddress', optional(Skill::presentAddress())?optional(Skill::presentAddress())->others:null, ['class' => 'form-control', 'rows'=>2])}}
                    {!! $errors->first('presentAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_area_code') ? 'has-error' : '' }}">
                    <label for="present_area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('present_area_code', optional(Skill::presentAddress())?optional(Skill::presentAddress())->post_code:null,['class'=>'form-control present_out','placeholder'=>" ",'id'=>'present_area_code']) !!}
                    {!! $errors->first('present_area_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h5>
                    Same as Present Address
                    {{Form::checkbox('same_address', 1, false,['id'=>'same_as_present'])}}
                </h5>
            </div>
        </div>
        <div class="row" id="permanent_address_area">
            <div class="col-sm-12 col-md-6 col-lg-6"><h5>Permanent Address </h5></div>

            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {{Form::radio('permanent_address', 1, optional(Skill::permanentAddress())->in_bangladesh==1?"checked":false,['id'=>'ppa1','class'=>'same_as_present'])}}
                    Inside Bangladesh
                    {{Form::radio('permanent_address', 0, optional(Skill::permanentAddress())->in_bangladesh==0?"checked":false,['id'=>'ppa2','class'=>'same_as_present'])}}
                    Outside Bangladesh
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('permanent_country_id') ? 'has-error' : '' }}">
                    <label for="permanent_country_id" class="control-label">Country</label>
                    {!! Form::select('permanent_country_id', $countries,optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->country_id:null,['class'=>'custom-select mb-3 same_as_present','placeholder'=>" ",'id'=>'permanent_country_id']) !!}
                    {!! $errors->first('permanent_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_division_id') ? 'has-error' : '' }}">
                    <label for="permanent_division_id" class="control-label">Division</label>
                    {!! Form::select('permanent_division_id', $divisions,optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->division_id:null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" ",'id'=>'permanent_division_id']) !!}
                    {!! $errors->first('permanent_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_district_id') ? 'has-error' : '' }}">
                    <label for="permanent_district_id" class="control-label">District</label>
                    {!! Form::select('permanent_district_id', $districts,optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->district_id:null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" ",'id'=>'permanent_district_id']) !!}
                    {!! $errors->first('permanent_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_thana_id') ? 'has-error' : '' }}">
                    <label for="permanent_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('permanent_thana_id', $upazilas,optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->upazila_id:null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" ",'id'=>'permanent_thana_id']) !!}
                    {!! $errors->first('permanent_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('permanentAddress') ? 'has-error' : '' }}">
                    {{Form::textarea('permanentAddress',optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->others:null, ['class' => 'form-control same_as_present', 'rows'=>2,'id'=>'permanentAddress'])}}
                    {!! $errors->first('permanentAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_area_code') ? 'has-error' : '' }}">
                    <label for="permanent_area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('permanent_area_code',optional(Skill::permanentAddress())?optional(Skill::permanentAddress())->post_code:null,['class'=>'form-control same_as_present permanent_out','placeholder'=>" ",'id'=>'permanent_area_code']) !!}
                    {!! $errors->first('permanent_area_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </div>
        </div>
    </div>

</div>


@push('style')
    <style>
        .card-default {
            color: #333;
            background: linear-gradient(#fff, #ebebeb) repeat scroll 0 0 transparent;
            font-weight: 600;
            border-radius: 6px;
        }

    </style>
@endpush
@push('script')
    <script>
        //present country  on change call division

        $('#present_country_id').change(function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-state-list')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#present_division_id").empty();
                            $("#present_division_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#present_division_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                            //custom
                            $("#present_district_id").empty();
                            $("#present_thana_id").empty();
                            //custom
                        } else {
                            $("#present_division_id").empty();
                        }
                    }
                });
            } else {
                $("#present_division_id").empty();
                $("#present_district_id").empty();
                $("#present_thana_id").empty();
            }
        });
        //present division  on change call district
        $('#present_division_id').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-city-list')}}?state_id=" + stateID,
                    success: function (res) {
                        if (res) {
                            $("#present_district_id").empty();
                            $("#present_district_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#present_district_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                            $("#present_thana_id").empty();
                        } else {
                            $("#present_district_id").empty();
                        }
                    }
                });
            } else {
                $("#present_district_id").empty();
            }

        });
        $('#present_district_id').on('change', function () {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-thana-list')}}?district_id=" + districtID,
                    success: function (res) {
                        if (res) {
                            $("#present_thana_id").empty();
                            $("#present_thana_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#present_thana_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $("#present_thana_id").empty();
                        }
                    }
                });
            } else {
                $("#present_thana_id").empty();
            }

        });
    </script>
    <script>
        $(document).ready(function () {
            //on load permanent address some field disable
            var permanent_address = $("input[name='permanent_address']:checked").val();
            if (permanent_address == 0) {
                $('#permanent_address_area:input,.permanent_out').attr('disabled', true);
            }
            //on load present address some field disable
            var present_address = $("input[name='present_address']:checked").val();
            if (present_address == 0) {
                $('#present_address_area:input,.present_out').attr('disabled', true);
            }
            //present address disable code here
            $("#pa2").click(function () {
                $("#present_division_id").empty();
                $("#present_district_id").empty();
                $("#present_thana_id").empty();
                $('#present_area_code').val('');
                $('#present_address_area:input,.present_out').attr('disabled', true);

            });
            //present address enable code hear
            $("#pa1").click(function () {
                $('#present_address_area :input,.present_out').removeAttr('disabled');
            });
            /////////////////////////////////
            //permanent address disable code here
            $("#ppa2").click(function () {
                $("#permanent_division_id").empty();
                $("#permanent_district_id").empty();
                $("#permanent_thana_id").empty();
                $('#permanent_area_code').val('');
                $('#permanent_address_area:input,.permanent_out').attr('disabled', true);
            });
            //permanent address  enable code here
            $("#ppa1").click(function () {
                $('#permanent_address_area :input,.permanent_out').removeAttr('disabled');
            });
            //permanent address same as present address, all field are disable
            $('#same_as_present').on('change', function () {
                sameAsPermanent();
            });
        });
        //date of birth using calender
        $(function () {
            $(".date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        });
    </script>
    <script>

        $('#permanent_country_id').change(function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-state-list')}}?country_id=" + countryID,
                    success: function (res) {
                        if (res) {
                            $("#permanent_division_id").empty();
                            $("#permanent_division_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#permanent_division_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                            //custom
                            $("#permanent_district_id").empty();
                            $("#permanent_thana_id").empty();
                            //custom

                        } else {
                            $("#permanent_division_id").empty();
                        }
                    }
                });
            } else {
                $("#permanent_division_id").empty();
                $("#permanent_district_id").empty();
                $("#permanent_thana_id").empty();
            }
        });
        $('#permanent_division_id').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-city-list')}}?state_id=" + stateID,
                    success: function (res) {
                        if (res) {
                            $("#permanent_district_id").empty();
                            $("#permanent_district_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#permanent_district_id").append('<option value="' + key + '">' + value + '</option>');
                            });
                            $("#permanent_thana_id").empty();
                        } else {
                            $("#permanent_district_id").empty();
                        }
                    }
                });
            } else {
                $("#permanent_district_id").empty();
            }

        });
        $('#permanent_district_id').on('change', function () {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: "GET",
                    url: "{{url('get-thana-list')}}?district_id=" + districtID,
                    success: function (res) {
                        if (res) {
                            $("#permanent_thana_id").empty();
                            $("#permanent_thana_id").append('<option>Select</option>');
                            $.each(res, function (key, value) {
                                $("#permanent_thana_id").append('<option value="' + key + '">' + value + '</option>');
                            });

                        } else {
                            $("#permanent_thana_id").empty();
                        }
                    }
                });
            } else {
                $("#permanent_thana_id").empty();
            }

        });


        function sameAsPermanent() {
            if ($('#same_as_present').is(':checked')) {
                var present_country_id = $('#present_country_id').val();
                var present_division_id = $('#present_division_id').val();
                var present_district_id = $('#present_district_id').val();
                var present_thana_id = $('#present_thana_id').val();
                var present_area_code = $('#present_area_code').val();
                var permanentAddress = $('#permanentAddress').val();

                //set as  present address value in permanent address
                $('#permanent_country_id').val(present_country_id);
                $('#permanent_division_id').val(present_division_id);
                $('#permanent_district_id').val(present_district_id);
                $('#permanent_thana_id').val(present_thana_id);
                $('#permanent_area_code').val(present_area_code);
                $('#permanentAddress').val(permanentAddress);


                $('#permanent_address_area:input,.same_as_present').attr('disabled', true);
            } else {
                $('#permanent_address_area :input,.same_as_present').removeAttr('disabled');
                var permanent_address = $("input[name='permanent_address']:checked").val();
                if (permanent_address == 0) {
                    $('#permanent_address_area:input,.permanent_out').attr('disabled', true);
                } else {
                    $('#permanent_address_area :input,.permanent_out').removeAttr('disabled');
                    $("#permanent_country_id").val('');
                    $("#permanent_division_id").empty();
                    $("#permanent_district_id").empty();
                    $("#permanent_thana_id").empty();
                    $('#permanent_area_code').val('');
                    $('#permanentAddress').val('');

                }
            }
        }

    </script>


@endpush