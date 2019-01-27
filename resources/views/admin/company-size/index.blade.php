@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Company Size</h3>
                <div class="tile-body">


                    {!! Form::open(['url' => '/admin/company-size', 'class' => 'row']) !!}

                    @include ('admin.company-size.form',['text'=>'Add'])

                    {!! Form::close() !!}



                </div>
            </div>
        </div>
    </div>
@include('admin.company-size.get_index')


@endsection
