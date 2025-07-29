@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $optional ??= false ;
@endphp


<div @class(['form-group', $class])">
    <label for="{{ $name }}">
        {{ $label }} @if ($optional) (@lang('label.Optional')) @endif
        @if ($name === 'title')
            <span class="tip-topdata" data-tip="{{ $label }}"><i class="fa-solid fa-info"></i></span>
        @endif
    </label>
    @if ($type == 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control h-120"> {{ old($name, $value) }} </textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
            value="{{ old($name, $value) }}" class="form-control" @if ($name == 'surface') min="0" @endif
            @if ($name == 'price') placeholder="{{ $label }} (F CFA) " @else  placeholder="{{ $label }}" @endif>
    @endif

    @error($name)
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>
