
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Language Name</th>
                        <th>Written</th>
                        <th>Listening</th>
                        <th>Spoken</th>
                        <th>Reading</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->written}}</td>
                            <td>{{$item->listening}}</td>
                            <td>{{$item->spoken}}</td>
                            <td>{{$item->reading}}</td>
                            <td>
                                <a href="{{ url('/jobseeker/language/' . $item->id) }}" title="View Language"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('jobseeker/language/' . $item->id . '/edit') }}" title="Edit Language"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/language' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete department"
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
