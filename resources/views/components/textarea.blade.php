@php
    $label ??= null;
    $name ??= null;
    $type ??= null;
    $placeholder ??= null;
    $field_out ??= false;
    $value ??= null;
@endphp

<div class="@if($field_out) field-out @else field @endif">
    <label for={{$name}}>{{$label}}</label>
    <textarea name="{{$name}}" id="{{$name}}" placeholder="{{$placeholder}}" row="3" class=" @error($name) is-invalid @enderror">
{{$value}}
    </textarea>
    <small style="color: red; font-size: 0.5rem;">
        @if($errors->has($name))
            {{$errors->first($name)}}
        @endif
    </small>
</div>
