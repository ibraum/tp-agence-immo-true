@php
    $label ??= null;
    $name ??= null;
    $type ??= null;
    $placeholder ??= null;
    $options ??= null;
    $allOptions ??= null;
    $field_out ??= false;
@endphp



<div class="@if($field_out) field-out @endif">
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}[]" id="{{$name}}" class="form-control @error($name) is-invalid @enderror" multiple style="outline: 1px solid var(--blue);">
    @if($allOptions)
            @foreach($allOptions as $k => $v)
                <option value="{{$k}}" @selected($options->contains($k)) >{{$v}}</option>
            @endforeach
        @else
            @foreach($options as $k => $v)
                <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
        @endif
    </select>
    @error($name)
        <small style="color: red; font-size: 0.5rem;">
        @if($errors->has($name))
            {{$errors->first($name)}}
        @endif
    </small>
    @enderror
</div>
