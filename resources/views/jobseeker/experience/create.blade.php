@extends('layouts.master')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <a href="{{ url('jobseeker/experience') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Experience</h3>
                    <div class="tile-body">
                        {!! Form::open(['url' => '/jobseeker/experience', 'class' => 'row']) !!}
                        @include ('jobseeker.experience.form',['text'=>"Add",'experience'=>null])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

{{--
<div class="row">
<div class="ui-block-content">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
--}}
        @include('jobseeker.experience.get_index')
@endsection


