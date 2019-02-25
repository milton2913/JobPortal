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
                <h3 class="tile-title">reference</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">

                        <tr>
                            <td>Reference title</td>
                            <td>{{ $reference->name }}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{ $reference->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Relation</td>
                            <td>{{ $reference->referenceType->title }}</td>
                        </tr>
                        @if($reference->designation)
                        <tr>
                            <td>Designation</td>
                            <td>{{ $reference->designation }}</td>
                        </tr>
                        @endif
                        @if($reference->organization)
                        <tr>
                            <td>Organization</td>
                            <td>{{ $reference->organization }}</td>
                        </tr>
                        @endif
                    @if($reference->phone_office)
                        <tr>
                            <td>Office Phone</td>
                            <td>{{ $reference->phone_office }}</td>
                        </tr>
                    @endif

                    @if($reference->phone_residential)
                        <tr>
                            <td>Residential Phone</td>
                            <td>{{ $reference->phone_residential }}</td>
                        </tr>
                    @endif

                        @if($reference->email)
                            <tr>
                                <td>Email</td>
                                <td>{{ $reference->email }}</td>
                            </tr>
                        @endif
                        @if($reference->address)
                            <tr>
                                <td>Address</td>
                                <td>{!! $reference->address !!} </td>
                            </tr>
                        @endif
                        @if($reference->description)
                            <tr>
                                <td>Description</td>
                                <td>{{ $reference->description }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.reference.get_index')
@endsection
