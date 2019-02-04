
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Education Level</th>
                        <th>Degree Title</th>
                        <th>Major/Subject</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($educations as $item)
                        <tr>
                            <td>{{$item->educationLevel->name}}</td>
                            <td>{{$item->degree->name}}</td>
                            <td>{{$item->subject->title}}</td>
                            <td>
                                <a href="{{ url('/jobseeker/education/' . $item->id) }}" title="View education"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/jobseeker/education/' . $item->id . '/edit') }}" title="Edit education"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/education' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete education"
                                            onclick="return confirm('Confirm delete')"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.datatable')