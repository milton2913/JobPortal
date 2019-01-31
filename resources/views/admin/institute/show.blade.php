@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/institute') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Institute</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <tr>
                        <td>Country</td>
                        <td>{{ optional($institute)->country->name }}</td>
                    </tr>
                    <tr>
                        <td>Institute</td>
                        <td>{{ optional($institute)->name }}</td>
                    </tr>

                    <tr>
                        <td>Active</td>
                        <td>{{ $institute->is_active?$institute->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.institute.get_index')
@endsection
