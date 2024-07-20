@php
    $label ??= null;
    $name ??= null;
    $type ??= null;
    $placeholder ??= null;
@endphp
<div class="w-100 d-flex v-stack gap-1 justify-content-start" style="padding-left: 0; margin-left: 0">
    <label for="{{$name}}" class="" style="padding-left: 0; margin-left: 0">{{$label}}</label>
    <div class="form-check form-switch w-100" style="padding-left: 0; margin-left: 0">
        <input type="{{$type}}" value="1" id="{{$name}}" class="form-check-input" style="padding-left: 0; margin-left: 0">
        @if($errors->has($name))
            <small style="color: red;  font-size: 0.5rem;">
                {{$errors->first($name)}}
            </small>
        @endif
    </div>
</div>

