@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/jobseeker/language') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Language</h3>
                <div class="tile-body">

                    {!! Form::model($language, ['method' => 'PATCH','url' => ['jobseeker/language', $language->id],'class' => 'row']) !!}
                    @include ('jobseeker.language.form',['text'=>"Update"])
                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.language.get_index')
    @endsection
