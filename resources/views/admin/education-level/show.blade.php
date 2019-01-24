@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/education-level') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Education Level</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Education Level</td>
                        <td>{{ optional($educationLevel)->name }}</td>
                    </tr>
                    <tr>
                        <td>Short Name</td>
                        <td>{{ optional($educationLevel)->short_name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ optional($educationLevel)->description }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $educationLevel->is_active?$educationLevel->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.education-level.get_index')
@endsection
