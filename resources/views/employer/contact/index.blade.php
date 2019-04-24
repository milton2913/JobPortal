@extends('layouts.master')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">
            <i class="far fa-check-circle"></i>
            {!! session('message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">contact</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/employer/contact-person', 'class' => 'row']) !!}

                    @include ('employer.contact.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('employer.contact.get_index')


@endsection
