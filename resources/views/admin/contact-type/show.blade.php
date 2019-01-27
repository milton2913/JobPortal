@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/contact-type') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Contact Type</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Contact Type</td>
                        <td>{{ optional($contactType)->title }}</td>
                    </tr>
                    <tr>
                        <td>Contact Type</td>
                        <td>{{ optional($contactType)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $contactType->is_active?$contactType->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.contact-type.get_index')
@endsection
