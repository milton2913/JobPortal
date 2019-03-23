@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                {{--<div class="content-footer">
                    <button id="btn-export" onclick="exportHTML();">Export to word
                        doc</button>
                </div>--}}

                <div class="tile-body ">
                    <div class="row source-html-outer">

                        <div class="col col-md-12 pt-100" id="source-html">
                            Upload your Profile Picture
                            Drag and Drop a file here or click for upload, Maximum file upload size 1MB. <a href="https://imageresize.org/" target="_blank">Resize and Compress Image Tool</a>
<br>
<br>
                            {!! Form::open(['url' => 'jobseeker/resume-upload', 'class' => 'row','files'=>true]) !!}
                            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group {{ $errors->has('resume') ? 'has-error' : '' }}">
                                    {!! Form::file('resume',null, ['class' => 'form-control ', 'required'=>true ]) !!}
                                    {!! $errors->first('resume', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group col-md-1 align-self-center">
                                <label class="control-label"></label>
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>
                            </div>
                            {!! Form::close() !!}
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('style')
    <style>

    </style>
@endpush

@push('script')
    <script type="text/javascript">


    </script>
@endpush