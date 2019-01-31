@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Job Level</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/job-level', 'class' => 'row']) !!}

                    @include ('admin.job-level.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.job-level.get_index')


@endsection
