@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a href="{{ url('/jobseeker/experience') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Experience</h3>
                <div class="tile-body">
                    <table class="table table-bordered" id="data-table">
                        <tr>
                            <td>Business</td>
                            <td>{{ $experience->company_business }}</td>
                        </tr>

                        <tr>
                            <td>Experience title</td>
                            <td>{{ $experience->title }}</td>
                        </tr>

                        <tr>
                            <td>Designation</td>
                            <td>{{ $experience->designation }}</td>
                        </tr>
                        <tr>
                            <td>Department</td>
                            <td>{{ $experience->department }}</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{ $experience->location }}</td>
                        </tr>
                        <tr>
                            <td>Responsibility</td>
                            <td>{{ $experience->responsibility }}</td>
                        </tr>
                            <tr>
                                <td>Year of experience</td>
                                <td>{{Skill::experienceCalculator($experience->start_date,$experience->end_date,$experience->is_current)}}</td>
                            </tr>

                        <tr>
                                <td>Experience Skill</td>
                                <td>
                                    @foreach($experience->skill as $skill)
                                        <span class="badge badge-success">{{$skill->title}}</span>

                                        @endforeach
                                </td>
                            </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('jobseeker.experience.get_index')
@endsection
