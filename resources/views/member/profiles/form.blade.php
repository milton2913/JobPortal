<div class="card card-default">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12"><h5>Personal Details</h5></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="control-label">Full Name</label>
                            {{Form::text('name', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            {{Form::email('email', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>50, 'required'=>true, 'placeholder'=>""])}}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <label for="mobile" class="control-label">Mobile</label>
                            {{Form::number('mobile', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>15, 'required'=>true, 'placeholder'=>""])}}
                            {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                </div>
                <div class="row">
                    @php
                        $genders = ['Male','Female','Others'];
                        $marital_status = ['Single','Married','Others'];
                        $religions = ['Islam','Christianity','Judaism','Hinduism','Buddhism','Others'];
                        $identity_types = ['National ID','Birth Certificate','Passport'];
                        $bloods = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
                    @endphp
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('genger') ? 'has-error' : '' }}">
                            <label for="genger" class="control-label">Genger</label>
                            {!! Form::select('genger', $genders,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                            {!! $errors->first('genger', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('marital_status') ? 'has-error' : '' }}">
                            <label for="marital_status" class="control-label">Marital Status</label>
                            {!! Form::select('marital_status', $marital_status,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                            {!! $errors->first('marital_status', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                            <label for="religion" class="control-label">Religion</label>
                            {!! Form::select('religion', $religions,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                            {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('blood') ? 'has-error' : '' }}">
                            <label for="blood" class="control-label">Blood Group</label>
                            {!! Form::select('blood', $bloods,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                            {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4">
                        <div class="form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
                            <label for="nationality" class="control-label">Nationality</label>
                            {!! Form::select('nationality', $nationality,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                            {!! $errors->first('nationality', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Date Of Birth</label>
                            <div class="input-group date">
                                <input class="form-control" type="text" />
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
                <div class="form-group {{ $errors->has('alternative_email') ? 'has-error' : '' }}">
                    <label for="alternative_email" class="control-label">Alternate Email</label>
                    {{Form::text('alternative_email', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('alternative_email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('alternative_mobile') ? 'has-error' : '' }}">
                    <label for="alternative_mobile" class="control-label">Alternate Mobile</label>
                    {{Form::text('alternative_mobile', null, ['class' => 'form-control','minlength'=>1, 'maxlength'=>100, 'required'=>true, 'placeholder'=>""])}}
                    {!! $errors->first('alternative_mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Identity</h5></div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group {{ $errors->has('identity_type') ? 'has-error' : '' }}">
                    <label for="identity_type" class="control-label">Identity Type</label>
                    {!! Form::select('identity_type', $identity_types,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
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

        <div class="row" id="present_address">
            <div class="col-sm-12 col-md-12 col-lg-12"><h5>Present Address</h5>
                <div class="form-group">
                    {{Form::radio('present_address', null, ['class' => 'form-control'])}} Inside Bangladesh
                    {{Form::radio('present_address', null, ['class' => 'form-control'])}} Outside Bangladesh
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_country_id') ? 'has-error' : '' }}">
                    <label for="present_country_id" class="control-label">Country</label>
                    {!! Form::select('present_country_id', $countries,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_division_id') ? 'has-error' : '' }}">
                    <label for="present_division_id" class="control-label">Division</label>
                    {!! Form::select('present_division_id', $divisions,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : '' }}">
                    <label for="present_district_id" class="control-label">District</label>
                    {!! Form::select('present_district_id', $districts,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_thana_id') ? 'has-error' : '' }}">
                    <label for="present_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('present_thana_id', $upazilas,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{Form::textarea('present_address', null, ['class' => 'form-control', 'rows'=>2])}}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('area_code') ? 'has-error' : '' }}">
                    <label for="area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('area_code', null,['class'=>'form-control','placeholder'=>" "]) !!}
                    {!! $errors->first('area_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="row" id="permanent_address">
            <div class="col-sm-12 col-md-6 col-lg-6"><h5>Permanent Address </h5></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><h5>Same as Present Address {!! Form::checkbox('same_as_present_address',null,['class'=>'form-control','id'=>'same_as_present_address']) !!}</h5></div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    {{Form::radio('permanent_address', null, ['class' => 'form-control'])}} Inside Bangladesh
                    {{Form::radio('permanent_address', null, ['class' => 'form-control'])}} Outside Bangladesh
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_country_id') ? 'has-error' : '' }}">
                    <label for="present_country_id" class="control-label">Country</label>
                    {!! Form::select('present_country_id', $countries,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_country_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_division_id') ? 'has-error' : '' }}">
                    <label for="present_division_id" class="control-label">Division</label>
                    {!! Form::select('present_division_id', $divisions,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_division_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_district_id') ? 'has-error' : '' }}">
                    <label for="present_district_id" class="control-label">District</label>
                    {!! Form::select('present_district_id', $districts,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('present_thana_id') ? 'has-error' : '' }}">
                    <label for="present_thana_id" class="control-label">Upazila</label>
                    {!! Form::select('present_thana_id', $upazilas,null,['class'=>'custom-select mb-3','placeholder'=>" "]) !!}
                    {!! $errors->first('present_thana_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{Form::textarea('present_address', null, ['class' => 'form-control', 'rows'=>2])}}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="form-group {{ $errors->has('area_code') ? 'has-error' : '' }}">
                    <label for="area_code" class="control-label">Zip/Postal Code</label>
                    {!! Form::text('area_code', null,['class'=>'form-control','placeholder'=>" "]) !!}
                    {!! $errors->first('area_code', '<p class="help-block">:message</p>') !!}
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
    @endpush