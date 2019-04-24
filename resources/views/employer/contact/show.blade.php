@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <a href="{{ url('/employer/contact-person') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <br>
            <br>
            <h3 class="tile-title">Contact Person</h3>
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">

                    <tr>
                        <td>Contact person name</td>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td>Person email</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <td>Person mobile</td>
                        <td>{{ $contact->mobile }}</td>
                    </tr>
                    <tr>
                        <td>Person designation</td>
                        <td>{{ $contact->designation }}</td>
                    </tr>
                    <tr>
                        <td>Person username</td>
                        <td>{{ $contact->username }}</td>
                    </tr>
                </table>
        </div>
    </div>
</div>
</div>
@include('employer.contact.get_index')

@endsection