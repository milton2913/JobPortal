
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th>Title</th>
                        <th>Is Active</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($institutes as $item)
                        <tr>
                            <td>{{$item->country->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->is_active==1?"Yes":"No"}}</td>
                            <td>
                                <a href="{{ url('/admin/institute/' . $item->id) }}" title="View institute"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('admin/institute/' . $item->id . '/edit') }}" title="Edit department"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/admin/institute' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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