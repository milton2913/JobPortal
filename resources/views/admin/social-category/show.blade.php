@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/admin/social-category') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Social Category</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Social Category</td>
                        <td>{{ optional($socialCategory)->name }}</td>
                    </tr>
                    <tr>
                        <td>Social Category CSS Class Name</td>
                        <td>{{ optional($socialCategory)->icon }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $socialCategory->is_active?$socialCategory->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.social-category.get_index')

@endsection