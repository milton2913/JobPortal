@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/result-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Result Type</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/result-type', 'class' => 'row']) !!}

                    @include ('admin.result-type.form',['text'=>"Add"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.result-type.get_index')
    @endsection
