@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row">
                        <div class="col col-md-3 pt-100">
                            <div class="card">
                                <div class="text-center pt-4 pb-5 pl-3 pr-3 bg-primary text-white">

                                    <img src="{{url('assets/uploads/avatar/'.$resume->avatar)}}" class="img-fluid rounded-circle" height="100">

                                    <h6 class="font-weight-bold text-uppercase animated fadeInUp">{{$resume->name}} </h6>
                                    <h6 class="font-weight-normal animated fadeInUp"><i class="fas fa-envelope"></i> {{$resume->email}}</h6>
                                    <h6 class="font-weight-normal animated fadeInUp"><i class="fas fa-phone"></i> {{$resume->mobile}}</h6>
                                    <h6 class="badge badge-warning font-weight-normal animated fadeInUp"><i class="far fa-address-card"></i> Job Seeker Profile</h6>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 10%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <ul class="nav flex-column sidebar-item">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{url('jobseeker-overview')}}"><i class="fas fa-info-circle"></i> Profile Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('jobseeker-dashboard')}}"><i class="fas fa-address-card"></i> Resume</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-clipboard-check"></i>  Applied Jobs <span class="badge badge-primary badge-pill">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-star"></i>  Bookmarked Jobs <span class="badge badge-primary badge-pill">0</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-user-check"></i>  Profile Viewed <span class="badge badge-primary badge-pill">0</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col col-md-9 pt-100">
                            <div class="card p-3 ">
                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Career Objective
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>

                                    @if($cvObjective)
                                        {{$cvObjective->objective}}
                                    @endif
                                </div>

                                {{----------------------end of objective----}}

                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Personal Information
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table row table-borderless w-100 m-0 ">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Father's Name :</strong> {{ $resume->profile->father_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Mother's Name :</strong> {{ $resume->profile->mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Date of Birth :</strong>
                                                    @if(isset($resume->profile->dob))
                                                        {{ Carbon\Carbon::parse($resume->profile->dob)->format('F j, Y') }}
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Gender : </strong>{{ $resume->profile->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Marital Status :</strong>
                                                    {{$resume->profile->marital_status}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Nationality :</strong>
                                                    @if($resume->profile->country_id)
                                                        {{$resume->profile->country->nationality}}
                                                        @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
{{--end of personal info--}}
                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Educational Qualification
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table table-bordered table-hover">
<thead>
<th>Exam Title</th>
<th>Concentration/Major</th>
<th>Institute</th>
<th>Country</th>
<th>Result</th>
<th>Pas.Year</th>
<th>Duration</th>
</thead>
                                            @foreach($resume->education as $education)

<tr>
    <td>
        {{ optional($education)->degree->name}}

    </td>
    <td>{{$education->subject->title}}</td>
    <td>{{$education->institute->name}}</td>
    <td>{{$education->institute->country->name}}</td>
    <td>
        @if($education->mark || $education->scale)
            {{($education->mark)?$education->mark:$education->scale}}
            @else
        {{$education->resultType}}
            @endif

    </td>
    <td>{{$education->year}}</td>
    <td>{{$education->duration}}</td>
</tr>
@endforeach
                                        </table>
                                    </div>
                                </div>

                                {{--end of Educational Qualification--}}



                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Expertise
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>

                                    <div class="table-responsive">

                                        <table  class="table table-bordered table-hover">
                                            @foreach($resume->expertise as $expertise)
                                                <tr>
                                                    <td>{{$expertise->skill->title}}</td>
                                                    <td>{{$expertise->expertStatus->title}}</td>
                                                </tr>
                                                <p></p>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

{{--expertise area--}}
                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Employment History
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table table-bordered table-hover">
                                            <thead>
                                            <th>Employment Title</th>
                                            <th>Business type</th>
                                            <th>Company name</th>
                                            <th>Designation</th>
                                            <th>Department</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Location</th>
                                            <th>Responsibility</th>
                                            </thead>
                                            @foreach($resume->experience as $experience)
                                                <tr>
                                                    <td>{{$experience->title}}</td>
                                                    <td>{{$experience->company_business}}</td>
                                                    <td>{{$experience->company_name}}</td>
                                                    <td>{{$experience->designation}}</td>
                                                    <td>{{$experience->department}}</td>
                                                    <td>{{$experience->start_date}}</td>
                                                    <td>{{$experience->end_date}}</td>
                                                    <td>{{$experience->location}}</td>
                                                    <td>{{$experience->responsibility}}</td>
                                                </tr>
                                                <p></p>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                {{--expertise area--}}



                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Training
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table table-bordered table-hover">
                                            <thead>
                                            <th>Title</th>
                                            <th>Covered topics</th>
                                            <th>Institute name</th>
                                            <th>Year</th>
                                            <th>Duration</th>
                                            <th>Location</th>
                                            <th>Country</th>
                                            </thead>
                                            @foreach($resume->training as $item)

                                                <tr>

                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->topic}}</td>
                                                    <td>{{$item->institute}}</td>
                                                    <td>{{$item->year}}</td>
                                                    <td>{{$item->duration}}</td>
                                                    <td>{{$item->location}}</td>
                                                    <td>{{$item->country->name}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                {{--trining area--}}


                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Certification
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table table-bordered table-hover">
                                            <thead>
                                            <th>Title</th>
                                            <th>Institute name</th>
                                            <th>Location</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            </thead>
                                            @foreach($resume->certification as $item)

                                                <tr>

                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->institute}}</td>
                                                    <td>{{$item->location}}</td>
                                                    <td>{{$item->start_date}}</td>
                                                    <td>{{$item->end_date}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                {{--certification--}}

                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Address
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table">

                                            @foreach($resume->address as $key=> $item)

                                                <tr>
                                                    <td>
                                                        <div class="card">
                                                            <div class="card-header">{{$item->address_type}}</div>
                                                            <div class="card-body">
                                                                <table class="table custom-table">

                    @if($item->others) <tr><td>Village:</td><td>{{$item->others}}</td></tr>@endif
                    @if($item->post_code) <tr><td>Post code</td><td>{{$item->post_code}}</td></tr>@endif

                    @if($item->upazila) <tr><td>Upazila</td><td>{{$item->upazila->name}}</td></tr>@endif
                    @if($item->district) <tr><td>District</td><td>{{$item->district->name}}</td></tr>@endif
                    @if($item->division) <tr><td>Division</td><td>{{$item->division->name}}</td></tr>@endif
                    @if($item->country) <tr><td>Country</td><td>{{$item->country->name}}</td></tr>@endif
                                                                </table></div>

                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                </div>
                                {{--address area--}}


                                <div class="card-body mb-1">
                                    <div class="d-flex justify-content-between alert alert-secondary">
                                        <h6 class="font-weight-bold m-0">
                                            Reference
                                        </h6>
                                        <a href=""><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="table-responsive">
                                        <table  class="table">

                                            @foreach($resume->reference as $key=> $item)
                                                <tr>
                                                    <td>
                                                        <div class="card">
                                                            <div class="card-header">Reference-{{$key+1}}</div>
                                                            <div class="card-body">
                                                                <table class="table custom-table">

                                                                    @if($item->name) <tr><td>Name</td><td>{{$item->name}}</td></tr>@endif
                                                                    @if($item->referenceType) <tr><td>Relation</td><td>{{$item->referenceType->title}}</td></tr>@endif
                                                                    @if($item->email) <tr><td>email</td><td>{{$item->email}}</td></tr>@endif
                                                                    @if($item->designation) <tr><td>designation</td><td>{{$item->designation}}</td></tr>@endif
                                                                    @if($item->organization) <tr><td>organization</td><td>{{$item->organization}}</td></tr>@endif
                                                                    @if($item->mobile) <tr><td>mobile</td><td>{{$item->mobile}}</td></tr>@endif
                                                                    @if($item->phone_office) <tr><td>phone_office</td><td>{{$item->phone_office}}</td></tr>@endif
                                                                    @if($item->phone_residential) <tr><td>phone_residential</td><td>{{$item->phone_residential}}</td></tr>@endif
                                                                    @if($item->address) <tr><td>address</td><td>{{$item->address}}</td></tr>@endif
                                                                    @if($item->name) <tr><td>Name</td><td>{{$item->name}}</td></tr>@endif



                                                                </table></div>

                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                </div>
                                {{--reference area--}}
                            </div>
</div>



</div>
</div>
</div>
</div>
</div>

@endsection


    @push('style')
        <style>
            .custom-table tr{line-height: .5px}
            .card-body{padding: 0px}
        </style>
        @endpush
