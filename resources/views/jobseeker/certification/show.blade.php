@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/jobseeker/certification') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">certification</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">

                        <tr>
                            <td>Title of Certification</td>
                            <td>{{ $certification->title }}</td>
                        </tr>
                        <tr>
                            <td>Institute Name</td>
                            <td>{{ $certification->institute }}</td>
                        </tr>
                        <tr>
                            <td>Location/address of Institute</td>
                            <td>{{ $certification->location }}</td>
                        </tr>
                        <tr>
                            <td>Start date</td>
                            <td>{{ $certification->start_date }}</td>
                        </tr>
                        <tr>
                            <td>End date </td>
                            <td>{{ $certification->end_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.certification.get_index')
@endsection
