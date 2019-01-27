@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Currency</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/currency', 'class' => 'row']) !!}

                    @include ('admin.currency.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.currency.get_index')


@endsection
