@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Skill</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/skill', 'class' => 'row']) !!}

                    @include ('admin.skill.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.skill.get_index')


@endsection
