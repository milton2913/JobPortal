@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/degree') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Degree</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Education Level</td>
                        <td>{{ optional($degree)->educationLevel->name }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ optional($degree)->name }}</td>
                    </tr>
                    <tr>
                        <td>Short Name</td>
                        <td>{{ optional($degree)->short_name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{!! optional($degree)->description !!}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $degree->is_active?$degree->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>

@endsection
