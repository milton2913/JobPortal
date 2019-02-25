
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <table class="table table-bordered" id="data-table">
                    <thead>
                    <tr>
                        <th>Title of Objective</th>
                        <th>Objective</th>
                        <th>Is Active</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cvObjectives as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{!! $item->objective !!}</td>
                            <td>

                                <button id="is_active{{$item->id}}" type="button" name="is_active"  data-is_active="{{$item->id}}" class="btn btn-xs btn-info is_active">

                                    @if($item->is_active==1)
                                        Active
                                    @else
                                        Not Active
                                    @endif
                                </button>












                            </td>
                            <td>
                                <a href="{{ url('/jobseeker/cv-objective/' . $item->id) }}" title="View Cv Objective"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('jobseeker/cv-objective/' . $item->id . '/edit') }}" title="Edit department"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                <form method="POST" action="{{ url('/jobseeker/cv-objective' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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

@push('script')
    <script type="text/javascript">
        //present country  on change call division
        $(document).on('click','.is_active',function () {
            var is_active = $(this).data("is_active");
            if(is_active){
                $.ajax({
                    type:"GET",
                    url:"{{url('cv-objective-status')}}?is_active="+is_active,
                    success:function(res){
                        $('.is_active').html("Not Active");
                        $('#is_active'+is_active).html("Active");
                    }
                });
            }
        });

        /*
        $(document).on('click','.is_active',function () {
            var is_active = $(this).data("is_active");
            $.ajax({
                method:"post",
                url:'/cv-objective-status',
                data:{
                    'is_active':is_active,
                },
                dataType:"text",
                success:function (data) {
                    //console.log(data);
                    $('.status').html("Not Active");
                    $('#is_active'+idea_id).html("Active");
                }
            });
            //$(this).closest('tr').remove();
        });
        */

    </script>
@endpush