@php
$class ??= null;
$name ??= '';
@endphp
<div @class(["form-check form-switch", $class])>
    <input type="hidden" id="{{ $name }}" name="{{ $name }}" value="0">
    <input @checked(old($name, $value ?? false)) class="form-check-input @error($name) is-invalid @enderror" type="checkbox" role="switch" id="{{ $name }}" name="{{ $name }}" value="1">
    <label class="form-check-label" for="{{ $name }}">{{ $label }} </label>
    @error($name) 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>