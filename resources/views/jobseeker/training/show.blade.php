@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/jobseeker/training') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Training</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">

                        <tr>
                            <td>Training title</td>
                            <td>{{ $training->title }}</td>
                        </tr>
                        <tr>
                            <td>Topics Covered</td>
                            <td>{{ $training->topic }}</td>
                        </tr>
                        <tr>
                            <td>Institute</td>
                            <td>{{ $training->title }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $training->country->name }}</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{ $training->location }}</td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{ $training->duration }}</td>
                        </tr>
                        <tr>
                            <td>Training Year </td>
                            <td>{{ $training->year }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.Training.get_index')
@endsection
