@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Expert Status</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/expert-status', 'class' => 'row']) !!}

                    @include ('admin.expert-status.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.expert-status.get_index')


@endsection
