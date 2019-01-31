@extends('layouts.master_member')
@section('content')
    <div class="ui-block-title ui-block responsive-flex">
            <div class="h6 title">{{ isset($title) ? $title : 'Educations' }}</div>
            <div class="w-search">
                <div class="form-group with-button">
                   <a href="{{ route('educations.education.index',[Alumni::getUsername()]) }}" class="btn btn-purple btn-sm btn-sm3" title="Show All Educations">
                                       <i class="fa fa-list" aria-hidden="true"></i>
                  </a>
                    <a href="{{ route('educations.education.create',[Alumni::getUsername()]) }}" class="btn btn-success btn-sm btn-sm3" title="Show All Educations">
                       <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>

                <a href="{{ route('educations.education.edit',[Alumni::getUsername(),$educations->id]) }}" class="btn btn-green btn-sm btn-sm3" title="Edit Educations">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
                    {!! Form::open([
                        'method' =>'DELETE',
                        'route'  => ['educations.education.destroy',Alumni::getUsername(),$educations->id]
                    ]) !!}

                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>',
                        [
                            'type'    => 'submit',
                            'class'   => 'btn btn-primary btn-sm btn-sm3',
                            'title'   => 'Delete Educations',
                            'onclick' => 'return confirm("' . 'Delete Educations?' . '")'
                        ])
                    !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

<div class="ui-block">
    <div class="ui-block-content">
        <div class="container">
        <table class="table table-condensed">
            <tbody>
                <tr>
    <td class="show-column">Education Level : </td>
    <td class="show-value">{{ optional($educations->educationLevel)->name }}</td>
</tr>
<tr>
    <td class="show-column">Degree : </td>
    <td class="show-value">{{ optional($educations->degree)->name }}</td>
</tr>
<tr>
    <td class="show-column">Major : </td>
    <td class="show-value">{{ $educations->major }}</td>
</tr>
<tr>
    <td class="show-column">Institute : </td>
    <td class="show-value">{{ $educations->institute }}</td>
</tr>
<tr>
    <td class="show-column">Is Foreign Institute : </td>
    <td class="show-value">{{ $educations->is_foreign_institute }}</td>
</tr>
<tr>
    <td class="show-column">Achievement : </td>
    <td class="show-value">{{ $educations->achievement }}</td>
</tr>
<tr>
    <td class="show-column">Result Type : </td>
    <td class="show-value">{{ optional($educations->resultType)->name }}</td>
</tr>
<tr>
    <td class="show-column">Is Hide : </td>
    <td class="show-value">{{ $educations->is_hide }}</td>
</tr>
<tr>
    <td class="show-column">Mark : </td>
    <td class="show-value">{{ $educations->mark }}</td>
</tr>
<tr>
    <td class="show-column">Cgpa : </td>
    <td class="show-value">{{ $educations->cgpa }}</td>
</tr>
<tr>
    <td class="show-column">Scale : </td>
    <td class="show-value">{{ $educations->scale }}</td>
</tr>
<tr>
    <td class="show-column">Year : </td>
    <td class="show-value">{{ $educations->year }}</td>
</tr>
<tr>
    <td class="show-column">Duration : </td>
    <td class="show-value">{{ $educations->duration }}</td>
</tr>

            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection