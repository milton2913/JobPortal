@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/job-level') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Job Level</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Job Level</td>
                        <td>{{ optional($jobLevel)->title }}</td>
                    </tr>
                    <tr>
                        <td>Job Level Slug</td>
                        <td>{{ optional($jobLevel)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $jobLevel->is_active?$jobLevel->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.job-level.get_index')
@endsection
