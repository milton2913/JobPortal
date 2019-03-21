@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/jobseeker/reference') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Social Media</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">

                        <tr>
                            <td>Social Media Name</td>

                            <td>{{ $social->socialCategory->name }}</td>
                        </tr>
                        <tr>
                            <td>Social Media URL</td>
                            <td>{{ $social->url }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.social.get_index')
@endsection
