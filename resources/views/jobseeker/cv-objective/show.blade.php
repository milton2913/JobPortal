@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/jobseeker/cv-objective') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Cv Objective</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Title of Objective</td>
                        <td>{{ $cvObjective->title }}</td>
                    </tr>
                    <tr>
                        <td>Objective</td>
                        <td>{!! $cvObjective->objective !!}</td>
                    </tr>
                    <tr>
                        <td>Is Active</td>
                        <td>{{($cvObjective->is_active==1)?"yes":"no"}}</td>
                    </tr>

                </table>
        </div>
    </div>
</div>
</div>
@include('jobseeker.cv-objective.get_index')

@endsection