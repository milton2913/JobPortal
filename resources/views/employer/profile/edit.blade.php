@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            {!! Form::model($employer, [
                            'method' => 'PUT',
                            'route' => ['employer.profile.update',$employer->id],
                            'class' => 'form-horizontal',
                            'files' => true,

                        ]) !!}
            @include ('employer.profile.form')

            {!! Form::close() !!}

        </div>
    </div>
@endsection
