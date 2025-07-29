@php
    $label ??= null;
    $class ??= null;
    $name ??= '';
    $options ??= [];
    $selected ??= '';
    $optional ??= false;
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">
        {{ $label }}
        @if ($optional)
            (@lang('label.Optional'))
        @endif
    </label>

    <select id="{{ $name }}" name="{{ $name }}" class="form-control">
        <option value="">&nbsp;</option>
        @foreach ($options as $option)
            <option value="{{ $option }}"
                @if (old($name, $selected) == $option) selected @endif>
                {{ ucwords(str_replace('_', ' ', $option)) }}
                @if ($name == 'year_built') @lang('label.Years') @endif
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
