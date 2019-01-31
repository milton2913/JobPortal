@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Institute</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/institute', 'class' => 'row']) !!}

                    @include ('admin.institute.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.institute.get_index')


@endsection
