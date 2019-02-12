
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Year of experience ({{Skill::totalExperience(\Illuminate\Support\Facades\Auth::id())}})</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($experiences as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->designation}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{Skill::experienceCalculator($item->start_date,$item->end_date,$item->is_current)}}</td>
                            <td>
                                <a href="{{ url('/jobseeker/experience/' . $item->id) }}" title="View experience"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/jobseeker/experience/' . $item->id . '/edit') }}" title="Edit experience"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/experience' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete experience"
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