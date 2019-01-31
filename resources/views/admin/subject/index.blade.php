@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Subject</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/subject', 'class' => 'row']) !!}

                    @include ('admin.subject.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.subject.get_index')


@endsection
