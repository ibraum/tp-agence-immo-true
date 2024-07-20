@extends('navbar.navbar')

@section('content')
    <section class="edit-section">
        <form action="{{route('admin.options.store')}}" method="post" id="form"  class="edit-form">
            @csrf
            <a href="{{route('admin.options.index')}}" class="return-btn">&larr;</a>
            @include('components.input', ['label' => 'Name', 'name' => 'name', 'type' => 'text'])
            <button class="btn-submit" type="submit">Submit</button>
        </form>
    </section>
@endsection
