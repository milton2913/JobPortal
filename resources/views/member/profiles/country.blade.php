<option>--- Select Division ---</option>
@if(!empty($divisions))
    @foreach($divisions as $key => $value)
        <option value="{{ $value->id }}">{{ $value->name }}</option>
    @endforeach
@endif