@php
    $label ??= null;
    $name ??= null;
    $type ??= null;
    $placeholder ??= null;
    $readonly ??= false;
    $update ??= false;
    $value ??= null;
    $field_out ??= false;
    $multiple ??= false;
@endphp

<div class="update-field @if($readonly) update-field @endif @if($field_out) field-out @else field @endif">
    <label for={{$name}}>{{$label}}</label>
    @if($readonly)
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" placeholder="{{$value}}" value="{{$value->name}}" readonly class="@error($name) is-invalid @enderror">
    @elseif($update)
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" placeholder="{{$value}}" value="{{$value}}" class="@error($name) is-invalid @enderror" @if($multiple) multiple @endif>
    @else
        <input type="{{$type}}" name="{{$name}}@if($multiple)[]@endif" id="{{$name}}"  class="@error($name) is-invalid @enderror" @if($multiple) multiple @endif>
    @endif

    <small style="color: red;  font-size: 0.5rem;">
        @if($errors->has($name))
            {{$errors->first($name)}}
        @endif
    </small>
</div>
