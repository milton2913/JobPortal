@extends('layouts.master')

@section('content')



    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <a href="{{ url('/admin/social-category') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <h3 class="tile-title">Social Category</h3>
                <div class="tile-body">

                    {!! Form::model($socialCategory, ['method' => 'PATCH','url' => ['admin/social-category', $socialCategory->id],'class' => 'row']) !!}


                    @include ('admin.social-category.form',['text'=>"Update"])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
    @include('admin.social-category.get_index')
    @endsection
