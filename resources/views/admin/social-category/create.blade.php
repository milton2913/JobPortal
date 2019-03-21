@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/social-category') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Social Category</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/social-category', 'class' => 'row']) !!}

                    @include ('admin.social-category.form',['text'=>"Add"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.social-category.get_index')
    @endsection
