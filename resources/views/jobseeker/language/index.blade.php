@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Language</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/jobseeker/language', 'class' => 'row']) !!}

                    @include ('jobseeker.language.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('jobseeker.language.get_index')


@endsection
