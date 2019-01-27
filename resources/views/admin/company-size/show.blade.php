@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/company-size') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Company Size</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Company Size</td>
                        <td>{{ optional($companySize)->title }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $companySize->is_active?$companySize->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.company-size.get_index')
@endsection
