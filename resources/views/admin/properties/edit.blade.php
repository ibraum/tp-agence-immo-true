@extends('navbar.navbar')

@section('content')
    <section class="create-section">
        <a href="{{route('admin.properties.index')}}" class="return-btn" style="padding: 2px 10px;" type="submit">&larr;Retour</a>
        <form action="{{route('admin.properties.update', $property->id)}}" method="post" id="form" style=" min-height: 50px;" class="edit-form property-create">
            @csrf
            @method('PUT')
            @include('components.input', ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'field_out' => 'true', 'value' => $property->title, 'update' => 'true'])
            <div class="group-input1">
                @include('components.input', ['label' => 'Surface', 'name' => 'surface', 'type' => 'number', 'value' => $property->surface, 'update' => 'true'])
                @include('components.input', ['label' => 'Rooms', 'name' => 'rooms', 'type' => 'number', 'value' => $property->rooms, 'update' => 'true'])
                @include('components.input', ['label' => 'Bedrooms', 'name' => 'bedrooms', 'type' => 'number', 'value' => $property->bedrooms, 'update' => 'true'])
            </div>
            <div class="group-input2">
                @include('components.input', ['label' => 'Floor', 'name' => 'floor', 'type' => 'number', 'value' => $property->floor, 'update' => 'true'])
                @include('components.input', ['label' => 'Price', 'name' => 'price', 'type' => 'number', 'value' => $property->price, 'update' => 'true'])
            </div>
            @include('components.input', ['label' => 'City', 'name' => 'city', 'type' => 'text', 'field_out' => 'true', 'value' => $property->city, 'update' => 'true'])
            @include('components.input', ['label' => 'Address', 'name' => 'address', 'type' => 'text', 'field_out' => 'true', 'value' => $property->address, 'update' => 'true'])
            @include('components.input', ['label' => 'Postal code', 'name' => 'postal_code', 'type' => 'text', 'field_out' => 'true', 'value' => $property->postal_code, 'update' => 'true'])
            @include('components.textarea', ['label' => 'Description', 'name' => 'description', 'field_out' => 'true', 'value' => $property->description])
            <div class="p-4">
                @include('components.checkbox', ['label' => 'Sold', 'name' => 'sold', 'type' => 'checkbox'])
            </div>
            @include('components.select', ['label' => 'Options', 'name' => 'options', 'options' => $property->options()->pluck( 'id'), 'allOptions' => $allOptions, 'field_out' => 'true'])
            <button class="btn-submit" type="submit" style="z-index: 0;">Submit</button>
        </form>
    </section>
@endsection
