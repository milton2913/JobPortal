@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/jobseeker/cv-objective') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Cv Objective</h3>
                <div class="tile-body">

                    {!! Form::model($cvObjective, ['method' => 'PATCH','url' => ['jobseeker/cv-objective', $cvObjective->id],'class' => 'row']) !!}


                    @include ('jobseeker.cv-objective.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.cv-objective.get_index')
    @endsection
