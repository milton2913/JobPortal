@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class="far fa-check-circle"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Profiles</h4>
            </div>
        </div>
        
        @if(count($profiles) == 0)
            <div class="panel-body text-center">
                <h4>No Profiles Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Country</th>
                            <th>District</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Nid</th>
                            <th>Passport No</th>
                            <th>Birth Certificate</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ optional($profile->user)->id }}</td>
                            <td>{{ optional($profile->country)->id }}</td>
                            <td>{{ optional($profile->district)->id }}</td>
                            <td>{{ $profile->father_name }}</td>
                            <td>{{ $profile->mother_name }}</td>
                            <td>{{ $profile->nid }}</td>
                            <td>{{ $profile->passport_no }}</td>
                            <td>{{ $profile->birth_certificate }}</td>

                            <td>

                                <form method="POST" action="{!! route('profiles.profile.destroy', $profile->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('profiles.profile.show', $profile->id ) }}" class="btn btn-info" title="Show Profile">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('profiles.profile.edit', $profile->id ) }}" class="btn btn-primary" title="Edit Profile">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Profile" onclick="return confirm(&quot;Delete Profile?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $profiles->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection