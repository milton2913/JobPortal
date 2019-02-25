
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Skill</th>
                        <th>Expert Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expertises as $item)
                        <tr>
                            <td>{{$item->skill->title}}</td>
                            <td>{{$item->expertStatus->title}}</td>
                            <td>
                                <a href="{{ url('/jobseeker/expertise/' . $item->id) }}" title="View expertise"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('jobseeker/expertise/' . $item->id . '/edit') }}" title="Edit department"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/expertise' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
