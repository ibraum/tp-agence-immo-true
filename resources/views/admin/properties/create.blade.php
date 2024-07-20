@extends('navbar.navbar')

@section('content')
   <section class="create-section">
   <a href="{{route('admin.properties.index')}}" class="return-btn" style="padding: 2px 10px;" type="submit">&larr;Retour</a>
   <form action="{{route('admin.properties.store')}}" method="post" id="form" style=" min-height: 50px;" class="edit-form property-create" enctype="multipart/form-data">
        @csrf
        @include('components.input', ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'field_out' => 'true'])
        <div class="group-input1">
            @include('components.input', ['label' => 'Surface', 'name' => 'surface', 'type' => 'number'])
            @include('components.input', ['label' => 'Rooms', 'name' => 'rooms', 'type' => 'number'])
            @include('components.input', ['label' => 'Bedrooms', 'name' => 'bedrooms', 'type' => 'number'])
        </div>
        <div class="group-input2">
            @include('components.input', ['label' => 'Floor', 'name' => 'floor', 'type' => 'number'])
            @include('components.input', ['label' => 'Price', 'name' => 'price', 'type' => 'number'])
        </div>
        @include('components.input', ['label' => 'City', 'name' => 'city', 'type' => 'text', 'field_out' => 'true'])
        @include('components.input', ['label' => 'Address', 'name' => 'address', 'type' => 'text', 'field_out' => 'true'])
       @include('components.input', ['label' => 'Postal code', 'name' => 'postal_code', 'type' => 'text', 'field_out' => 'true'])
       @include('components.input', ['label' => 'Image', 'name' => 'imageName', 'type' => 'file', 'field_out' => 'true', 'multiple' => true])
        @include('components.textarea', ['label' => 'Description', 'name' => 'description', 'field_out' => 'true'])
        <div class="p-4">
            @include('components.checkbox', ['label' => 'Sold', 'name' => 'sold', 'type' => 'checkbox'])
        </div>
        @include('components.select', ['label' => 'Options', 'name' => 'options', 'options' => $options, 'field_out' => 'true'])
        <button class="btn-submit" type="submit" style="z-index: 0;">Submit</button>
    </form>
   </section>
@endsection
