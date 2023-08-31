@php
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
$label ??= ucfirst($name);
$disabled ??= false;
@endphp
<div @class([ "form-group" , $class])>
    <label for="{{ $name }}">{{ $label }} </label>
    @if($type=='textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"> {{ old($name, $value )}}</textarea>
    @else
        @if($disabled==true)
            <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value )}}" disabled>
        @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value )}}">
        @endif
    @endif
    @error($name) 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
