@extends('navbar.navbar')

@section('content')
<section class="edit-section">
<form action="" method="post" id="form" class="edit-form">
        @csrf
        @include('components.input', ['label' => 'Name', 'name' => 'name', 'type' => 'text', 'readonly' => true, 'value' => $option])
        <a href="{{route('admin.options.index')}}" class="return-btn">&larr; return</a>
    </form>
</section>
@endsection
