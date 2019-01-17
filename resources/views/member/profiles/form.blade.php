<div class="card card-default">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12"><h5>Personal Details</h5></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="control-label">Full Name</label>
                            {{Form::text('name', optional($user)->name?optional($user)->name:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>"",'disabled'])}}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            {{Form::email('email', optional($user)->email?optional($user)->email:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>50, 'required'=>true, 'placeholder'=>""])}}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="control-label">Mobile</label>
                            {{Form::number('mobile', optional($user)->mobile?optional($user)->mobile:null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>15, 'required'=>true, 'placeholder'=>""])}}
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
                            {!! Form::select('gender', $genders,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                            <label for="marital_status" class="control-label">Marital Status</label>
                            {!! Form::select('marital_status', $marital_status,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                            <label for="religion" class="control-label">Religion</label>
                            {!! Form::select('religion', $religions,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('blood') ? 'has-error' : '' }}">
                            <label for="blood" class="control-label">Blood Group</label>
                            {!! Form::select('blood', $bloods,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
                            <label for="nationality" class="control-label">Nationality</label>
                            {!! Form::select('nationality', $nationality,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                            {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Date Of Birth</label>
                            <div class="input-group date">
                                <input class="form-control" type="text" name="date_of_birth"  required="required" />
                                <span class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-md-2 col-lg-3">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('father_name') ? 'has-error' : '' }}">
                    <label for="father_name" class="control-label">Father Name</label>
                    {{Form::text('father_name', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('father_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                    <label for="mother_name" class="control-label">Mother Name</label>
                    {{Form::text('mother_name', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('mother_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('alternate_email') ? 'has-error' : '' }}">
                    <label for="alternate_email" class="control-label">Alternate Email</label>
                    {{Form::text('alternate_email', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('alternate_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('alternate_mobile') ? 'has-error' : '' }}">
                    <label for="alternate_mobile" class="control-label">Alternate Mobile</label>
                    {{Form::text('alternate_mobile', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('alternate_mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Identity</h5></div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('identity_type') ? 'has-error' : '' }}">
                    <label for="identity_type" class="control-label">Identity Type</label>
                    {!! Form::select('identity_type', $identity_types,null,['class'=>'custom-select mb-3','placeholder'=>" ",'required'=>true]) !!}
                    {!! $errors->first('identity_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="control-label">Identity No.</label>
                    {{Form::text('identity_no', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>30, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row" id="present_address_area">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Present Address</h5>
                <div class="form-group">
                    {{Form::radio('present_address', 1, true,['id'=>'pa1'])}}Inside Bangladesh
                    {{Form::radio('present_address', 0, false,['id'=>'pa2'])}}Outside Bangladesh
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_country_id') ? 'has-error' : '' }}">
                    <label for="present_country_id" class="control-label">Country</label>
                    {!! Form::select('present_country_id', $countries,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_division_id') ? 'has-error' : '' }}">
                    <label for="present_division_id" class="control-label">Division</label>
                    {!! Form::select('present_division_id', $divisions,null,['class'=>'custom-select mb-3 present_out','placeholder'=>" "]) !!}
                    {!! $errors->first('present_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : '' }}">
                    <label for="present_district_id" class="control-label">District</label>
                    {!! Form::select('present_district_id', $districts,null,['class'=>'custom-select mb-3 present_out','placeholder'=>" "]) !!}
                    {!! $errors->first('present_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_thana_id') ? 'has-error' : '' }}">
                    <label for="present_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('present_thana_id', $upazilas,null,['class'=>'custom-select mb-3 present_out','placeholder'=>" "]) !!}
                    {!! $errors->first('present_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('presentAddress') ? 'has-error' : '' }}">
                    {{Form::textarea('presentAddress', null, ['class' => 'form-control', 'rows'=>2])}}
                    {!! $errors->first('presentAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 pa12">
                <div class="form-group {{ $errors->has('present_area_code') ? 'has-error' : '' }}">
                    <label for="present_area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('present_area_code', null,['class'=>'form-control present_out','placeholder'=>" "]) !!}
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
        <div class="row disable-area" id="permanent_address_area">
            <div class="col-sm-12 col-md-6 col-lg-6"><h5>Permanent Address </h5></div>

            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {{Form::radio('permanent_address', 1, false,['id'=>'ppa1','class'=>'same_as_present'])}}Inside Bangladesh
                    {{Form::radio('permanent_address', 0, false,['id'=>'ppa2','class'=>'same_as_present'])}}Outside Bangladesh
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('permanent_country_id') ? 'has-error' : '' }}">
                    <label for="permanent_country_id" class="control-label">Country</label>
                    {!! Form::select('permanent_country_id', $countries,null,['class'=>'custom-select mb-3 same_as_present','placeholder'=>" "]) !!}
                    {!! $errors->first('permanent_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_division_id') ? 'has-error' : '' }}">
                    <label for="permanent_division_id" class="control-label">Division</label>
                    {!! Form::select('permanent_division_id', $divisions,null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" "]) !!}
                    {!! $errors->first('permanent_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_district_id') ? 'has-error' : '' }}">
                    <label for="permanent_district_id" class="control-label">District</label>
                    {!! Form::select('permanent_district_id', $districts,null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" "]) !!}
                    {!! $errors->first('permanent_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_thana_id') ? 'has-error' : '' }}">
                    <label for="permanent_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('permanent_thana_id', $upazilas,null,['class'=>'custom-select mb-3 same_as_present permanent_out','placeholder'=>" "]) !!}
                    {!! $errors->first('permanent_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('permanentAddress') ? 'has-error' : '' }}">
                    {{Form::textarea('permanentAddress', null, ['class' => 'form-control same_as_present', 'rows'=>2])}}
                    {!! $errors->first('permanentAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 ppa12">
                <div class="form-group {{ $errors->has('permanent_area_code') ? 'has-error' : '' }}">
                    <label for="permanent_area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('permanent_area_code', null,['class'=>'form-control same_as_present permanent_out','placeholder'=>" "]) !!}
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
            background: linear-gradient(#fff,#ebebeb) repeat scroll 0 0 transparent;
            font-weight: 600;
            border-radius: 6px;
        }

    </style>
    @endpush
@push('script')
    <script>
        $(function () {
            $(".date").datepicker({
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#pa2").click(function(){
                $('#present_address_area:input,.present_out').attr('disabled', true);
            });
            $("#pa1").click(function(){
                $('#present_address_area :input,.present_out').removeAttr('disabled');
            });
        });
        $(document).ready(function(){
            $("#ppa2").click(function(){
                $('#permanent_address_area:input,.permanent_out').attr('disabled', true);
            });
            $("#ppa1").click(function(){
                $('#permanent_address_area :input,.permanent_out').removeAttr('disabled');
            });
        });
        $(document).ready(function(){
            $('#same_as_present').on('change', function () {
                if ($('#same_as_present').is(':checked')) {
                    $('#permanent_address_area:input,.same_as_present').attr('disabled', true);
                } else {
                    $('#permanent_address_area :input,.same_as_present').removeAttr('disabled');
                }
            });
        });
    </script>


    @endpush