@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
            <a href="{{ url('/jobseeker/reference/create') }}" title="New"><button class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> New</button></a>
        </div>
            </div>
        </div>
    </div>
@include('jobseeker.reference.get_index')
@endsection
