@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {!! Form::open(['url' => '/jobseeker/social', 'class' => 'row']) !!}

                    @include ('jobseeker.social.form',['text'=>'Add'])

                    {!! Form::close() !!}
        </div>
            </div>
        </div>
    </div>
@include('jobseeker.social.get_index')

@endsection
