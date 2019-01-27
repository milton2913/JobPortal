@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Contact Type</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/contact-type', 'class' => 'row']) !!}

                    @include ('admin.contact-type.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.contact-type.get_index')


@endsection
