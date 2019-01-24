@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/education-level') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Education Level</h3>
                <div class="tile-body">

                    {!! Form::model($educationLevel, ['method' => 'PATCH','url' => ['admin/education-level', $educationLevel->id],'class' => 'row']) !!}


                    @include ('admin.education-level.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.education-level.get_index')
    @endsection
