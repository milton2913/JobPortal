<option>--- Select State ---</option>
@if(!empty($degree))
    @foreach($degree as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif