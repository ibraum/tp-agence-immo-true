@extends('navbar.navbar')

@section('content')
<section class="edit-section">
<form action="{{route('admin.options.update',  $option->id)}}" method="post" id="form" class="edit-form">
        @csrf
        @method('PUT')
        <a href="{{route('admin.options.index')}}" class="return-btn">&larr;</a>
        @include('components.input', ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'update' => true ,'value' => $option->name])
        <button class="btn-submit">submit</button>
    </form>
</section>

@endsection
