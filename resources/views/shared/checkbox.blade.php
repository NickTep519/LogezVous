@php
    $label ??= null;
    $name ??= '';
    $value ??= 0;
@endphp

<li>
    <input id="{{ $name }}" class="form-check-input" name="{{ $name }}" type="checkbox" value="1" {{ old($name, $value) ? 'checked' : '' }}>
    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
</li>
