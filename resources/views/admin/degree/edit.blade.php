@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/degree') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-12">

            <div class="tile">

                <h3 class="tile-title">Degree</h3>
                <div class="tile-body">

                    {!! Form::model($degree, ['method' => 'PATCH','url' => ['admin/degree', $degree->id],'class' => 'row']) !!}


                    @include ('admin.degree.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @endsection
