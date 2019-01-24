@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/industry-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Industry Type</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Industry Type</td>
                        <td>{{ optional($industryType)->title }}</td>
                    </tr>
                    <tr>
                        <td>Industry Type</td>
                        <td>{{ optional($industryType)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $industryType->is_active?$industryType->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.industry-type.get_index')

@endsection