@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/admin/skill') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Skill</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Skill Name</td>
                        <td>{{ optional($skill)->title }}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{ optional($skill)->slug }}</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>{{ $skill->is_active?$skill->is_active==1?"Yes":"No":"No"}}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('admin.skill.get_index')
@endsection
