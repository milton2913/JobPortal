@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/jobseeker/education') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Education</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">

                        <tr>
                            <td>Education Level</td>
                            <td>{{ optional($education)->educationLevel->name }}</td>
                        </tr>
                        <tr>
                            <td>Degree name</td>
                            <td>{{ optional($education)->degree->name }}</td>
                        </tr>
                        <tr>
                            <td>Major/Subject</td>
                            <td>{{ optional($education)->subject->title }}</td>
                        </tr>
                        <tr>
                            <td>Institute</td>
                            <td>{{ optional($education)->institute->name }}</td>
                        </tr>
                        <tr>
                            <td>Is foreign institute</td>
                            <td>{{ $education->is_foreign_institute?$education->is_foreign_institute==1?"Yes":"No":"No"}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $education->institute->country->name}}</td>
                        </tr>
                        <tr>
                            <td>Achievement</td>
                            <td>{!! $education->achievement !!}</td>
                        </tr>
                        <tr>
                            <td>Result type</td>
                            <td>{{ $education->resultType->name}}</td>
                        </tr>
                        @if($education->mark)
                        <tr>
                            <td>Marks</td>
                            <td>{{ $education->mark}}</td>
                        </tr>
                        @endif
                        @if($education->cgpa)
                            <tr>
                                <td>CGPA</td>
                                <td>{{ $education->cgpa ."out of".$education->scale}}</td>
                            </tr>
                        @endif
                        @if($education->year)
                            <tr>
                                <td>Pass Year</td>
                                <td>{{ $education->year}}</td>
                            </tr>
                            @endif
                        @if($education->duration)
                        <tr>
                            <td>Duration</td>
                            <td>{{ $education->duration}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Is Hide</td>
                            <td>{{ $education->is_hide?$education->is_hide==1?"Yes":"No":"No"}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.education.get_index')
@endsection
