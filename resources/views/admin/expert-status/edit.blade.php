@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/expert-status') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Expert Status</h3>
                <div class="tile-body">

                    {!! Form::model($expertStatus, ['method' => 'PATCH','url' => ['admin/expert-status', $expertStatus->id],'class' => 'row']) !!}


                    @include ('admin.expert-status.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.expert-status.get_index')
    @endsection
