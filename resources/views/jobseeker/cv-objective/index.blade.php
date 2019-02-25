@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Cv Objective</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/jobseeker/cv-objective', 'class' => 'row']) !!}

                    @include ('jobseeker.cv-objective.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('jobseeker.cv-objective.get_index')


@endsection
