@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/reference-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Reference Type </h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/reference-type', 'class' => 'row']) !!}

                    @include ('admin.reference-type.form',['text'=>"Add"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.reference-type.get_index')
    @endsection
