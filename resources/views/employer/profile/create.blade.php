@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            {!! Form::open(['url' =>route('employer.profile.store'), 'class' => 'form-horizontal', 'files' => true,]) !!}
               {{-- {!! Form::open(['url' => 'employer/profile/store', 'class' => 'form-horizontal']) !!}
--}}
            @include ('employer.profile.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection


