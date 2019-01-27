@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/company-size') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Company Size</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/company-size', 'class' => 'row']) !!}

                    @include ('admin.company-size.form',['text'=>"Add"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.company-size.get_index')
    @endsection
