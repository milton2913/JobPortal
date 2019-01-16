@extends('layouts.mastar')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

                {!! Form::open(['url' =>route('profiles.profile.store'), 'class' => 'form-horizontal', 'files' => true,'id'=>'profile_form']) !!}

            @include ('member.profiles.form', [
                                        'profile' => null,
                                      ])

                {!! Form::close() !!}

        </div>
    </div>
@endsection


