@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/job-level') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Job Level</h3>
                <div class="tile-body">

                    {!! Form::model($jobLevel, ['method' => 'PATCH','url' => ['admin/job-level', $jobLevel->id],'class' => 'row']) !!}


                    @include ('admin.job-level.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.job-level.get_index')
    @endsection
