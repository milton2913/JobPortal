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


                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                       aria-selected="true">Resume</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                       aria-selected="false">Video Resume</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


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
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    {!! Form::open(['url' => 'jobseeker/video-resume', 'class' => 'row']) !!}

                                    <label class="form-group">
                                        Linkup  your  video resume
                                    </label>
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group {{ $errors->has('video_resume') ? 'has-error' : '' }}">
                                            {!! Form::text('video_resume',$user->profile->video_resume?$user->profile->video_resume:$user->profile->video_resume, ['class' => 'form-control ' ]) !!}
                                            {!! $errors->first('video_resume', '<p class="help-block">:message</p>') !!}
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
        </div>
    </div>

@endsection


@push('style')
    <style>

    </style>
@endpush

@push('script')
    <script type="text/javascript">
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
       // console.log(activeTab);
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
        }
    </script>
@endpush