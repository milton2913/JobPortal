@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/result-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Result Type</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Result Type</td>
                        <td>{{ optional($resultType)->name }}</td>
                    </tr>
                    <tr>
                        <td>Result Type</td>
                        <td>{{ optional($resultType)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $resultType->is_active?$resultType->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.result-type.get_index')
@endsection
