@php
$class ??= null;
$name ??= '';
$value ??= '';
$label ??= ucfirst($name);
$multiple ??= false; 
@endphp
<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }} </label>
    @if($multiple)
        <select class="form-select selectMultiple form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}[]" value="{{ old($name, $value )}}" multiple>
        @foreach($options as $k => $v)
            <option value="{{ $k }}" @selected($value->contains($k))>{{ $v }}</option>
        @endforeach 
    @else
        <select class="form-select form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value )}}">
            <option value="">{{$default}}</option>
        @foreach($options as $k => $v)
            <option value="{{ $k }}" @selected(old($name, $value)==$k)>{{ $v }}</option>
        @endforeach 
    @endif
        
    </select>
    @error($name) 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>