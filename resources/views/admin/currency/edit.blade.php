@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/currency') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Currency</h3>
                <div class="tile-body">

                    {!! Form::model($currency, ['method' => 'PATCH','url' => ['admin/currency', $currency->id],'class' => 'row']) !!}


                    @include ('admin.currency.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.currency.get_index')
    @endsection
