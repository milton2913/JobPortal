@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Profile' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('profiles.profile.destroy', $profile->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('profiles.profile.index') }}" class="btn btn-primary" title="Show All Profile">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('profiles.profile.create') }}" class="btn btn-success" title="Create New Profile">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('profiles.profile.edit', $profile->id ) }}" class="btn btn-primary" title="Edit Profile">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Profile" onclick="return confirm(&quot;Delete Profile??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($profile->user)->id }}</dd>
            <dt>Country</dt>
            <dd>{{ optional($profile->country)->id }}</dd>
            <dt>District</dt>
            <dd>{{ optional($profile->district)->id }}</dd>
            <dt>Father Name</dt>
            <dd>{{ $profile->father_name }}</dd>
            <dt>Mother Name</dt>
            <dd>{{ $profile->mother_name }}</dd>
            <dt>Nid</dt>
            <dd>{{ $profile->nid }}</dd>
            <dt>Passport No</dt>
            <dd>{{ $profile->passport_no }}</dd>
            <dt>Birth Certificate</dt>
            <dd>{{ $profile->birth_certificate }}</dd>
            <dt>Address</dt>
            <dd>{{ $profile->address }}</dd>
            <dt>Post Code</dt>
            <dd>{{ $profile->post_code }}</dd>
            <dt>Date Of Birth</dt>
            <dd>{{ $profile->date_of_birth }}</dd>
            <dt>Gender</dt>
            <dd>{{ $profile->gender }}</dd>
            <dt>Marital Status</dt>
            <dd>{{ $profile->marital_status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $profile->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $profile->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection