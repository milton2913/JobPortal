@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/organization-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Organization Type</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Organization Type</td>
                        <td>{{ optional($organizationType)->title }}</td>
                    </tr>
                    <tr>
                        <td>Organization Type</td>
                        <td>{{ optional($organizationType)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $organizationType->is_active?$organizationType->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.organization-type.get_index')
@endsection
