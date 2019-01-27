@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/contact-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Contact Type</h3>
                <div class="tile-body">

                    {!! Form::model($contactType, ['method' => 'PATCH','url' => ['admin/contact-type', $contactType->id],'class' => 'row']) !!}


                    @include ('admin.contact-type.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.contact-type.get_index')
    @endsection
