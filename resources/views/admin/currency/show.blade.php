@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/currency') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Currency</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Country</td>
                        <td>{{ optional($currency)->country->name }}</td>
                    </tr>
                    <tr>
                        <td>Currency</td>
                        <td>{{ optional($currency)->title }}</td>
                    </tr>
                    <tr>
                        <td>Currency symbol</td>
                        <td>{{ optional($currency)->currency_symbol }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $currency->is_active?$currency->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.currency.get_index')
@endsection
