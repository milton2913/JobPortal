@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/organization-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Organization Type</h3>
                <div class="tile-body">

                    {!! Form::model($organizationType, ['method' => 'PATCH','url' => ['admin/organization-type', $organizationType->id],'class' => 'row']) !!}


                    @include ('admin.organization-type.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.organization-type.get_index')
    @endsection
