@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Organization Type</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/organization-type', 'class' => 'row']) !!}

                    @include ('admin.organization-type.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.organization-type.get_index')


@endsection
