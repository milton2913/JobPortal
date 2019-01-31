@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/skill') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Skill</h3>
                <div class="tile-body">

                    {!! Form::model($skill, ['method' => 'PATCH','url' => ['admin/skill', $skill->id],'class' => 'row']) !!}


                    @include ('admin.skill.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.skill.get_index')
    @endsection
