@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/expert-status') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Expert Status</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Expert status</td>
                        <td>{{ optional($expertStatus)->title }}</td>
                    </tr>
                    <tr>
                        <td>Expert status slug</td>
                        <td>{{ optional($expertStatus)->slug }}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.expert-status.get_index')

@endsection