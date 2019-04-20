@foreach($industries as $industry)
    <div class="col-md-4">
        <div class="animated-checkbox">
            <label>
                {!! Form::checkbox('industry_id[]',$industry->id) !!}
                <span class="label-text">{{$industry->title}}</span>
            </label>
        </div>

    </div>
@endforeach

