@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/employer/contact-person') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">contact</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/employer/contact-person', 'class' => 'row']) !!}

                    @include ('employer.contact.form',['text'=>"Add"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('employer.contact.get_index')
    @endsection
