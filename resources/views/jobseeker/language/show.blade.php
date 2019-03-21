@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/jobseeker/language') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <h3 class="tile-title">Language</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Language Name</td>
                        <td>{{ $language->name }}</td>
                    </tr>
                    <tr>
                        <td>Written</td>
                        <td>{{ $language->written }}</td>
                    </tr>
<tr>
                        <td>Listening</td>
                        <td>{{ $language->listening }}</td>
                    </tr>
<tr>
                        <td>Spoken</td>
                        <td>{{ $language->spoken }}</td>
                    </tr>
                    <tr>
                        <td>Reading</td>
                        <td>{{ $language->reading }}</td>
                    </tr>

                </table>
        </div>
    </div>
</div>
</div>
@include('jobseeker.language.get_index')

@endsection