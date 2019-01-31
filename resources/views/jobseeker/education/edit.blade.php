@extends('layouts.master_member')
@section('content')
<div class="ui-block-title ui-block responsive-flex">
    <div class="h6 title">Create New Educations</div>
    <div class="w-search">
        <div class="form-group with-button">
            <a href="{{ route('educations.education.index',[Alumni::getUsername()]) }}" class="btn btn-primary" title="Show All Educations">
               <i class="fa fa-list" aria-hidden="true"></i>
            </a>

            <a href="{{ route('educations.education.create',[Alumni::getUsername()]) }}" class="btn btn-success" title="Create New Educations">
               <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<div class="ui-block">
    <div class="ui-block-content">
        {!! Form::model($educations, [
            'method' => 'PUT',
            'route' => ['educations.education.update',Alumni::getUsername(),$educations->id],
            'class' => 'form-horizontal',
            'name' => 'edit_educations_form',
            'id' => 'edit_educations_form',
            
        ]) !!}
            <div class="row">

                    @include ('member.educations.form', ['educations' => $educations,])
                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group label-floating">
                        <div class="col-md-offset-12 col-md-12">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>


            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection