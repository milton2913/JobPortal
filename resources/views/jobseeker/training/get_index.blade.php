
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Topics Covered</th>
                        <th>Training Year</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trainings as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->topic}}</td>
                            <td>{{$item->year}}</td>
                            <td>
                                <a href="{{ url('/jobseeker/training/' . $item->id) }}" title="View training"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/jobseeker/training/' . $item->id . '/edit') }}" title="Edit training"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/training' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete training"
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