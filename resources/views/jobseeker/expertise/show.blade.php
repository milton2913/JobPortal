@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/jobseeker/expertise') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Expertise</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Skill</td>
                        <td>{{ $expertise->skill->title }}</td>
                    </tr>
                    <tr>
                        <td>Expert Status</td>
                        <td>{{ $expertise->expertStatus->title }}</td>
                    </tr>

                </table>
        </div>
    </div>
</div>
</div>
@include('jobseeker.expertise.get_index')

@endsection