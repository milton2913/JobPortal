@foreach($industries as $industry)
    <div class="col-md-4">
        <div class="animated-checkbox">
            <label>
{!! Form::checkbox('industry12[]',$industry->id, isset($selected_industry)?in_array($industry->id,$selected_industry)?1:0:0, ['id'=>$industry->id, 'class'=>'industry','bid'=>$industry->id]) !!}
                <span id="{{"business".$industry->id}}" class="label-text industry2">{{$industry->title}}</span>
            </label>
        </div>
    </div>
@endforeach

