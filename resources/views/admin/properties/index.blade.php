@extends('navbar.navbar')

@section('content')
    <section class="show_properties">
        <samll class="alert p-1" style="margin-left: 45px;">
            {{$properties->count()}} results
        </samll>
        <a class="actualise" href="{{route('admin.properties.index')}}">
            actualiser
        </a>
        @if(\Illuminate\Support\Facades\Auth::check())
            <a href="{{route('admin.properties.create')}}"
               class="btn-small" style="border-radius: 4px; margin-left: 20px; background-color: rgba(0, 0, 255, 0.1); color: black; text-decoration: none; padding: 10px 20px">
                Ajouter une proprieté
            </a>
        @endif
        <div class="div-houses2">
            @forelse($properties as $property)
                <div class="house">
                        @if(!empty($property->images[0]))
                            <div class="image" style="background-image: url('{{$property->images[0]->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover">

                            </div>
                    @else
                        <div class="image" style="font-size: 0.9rem; background-color: lightslategrey; display: flex; align-items: center; justify-content: center">
                            🖼Aucune(s) image(s) n'a été charger pour ce meuble ...
                        </div>
                        @endif

                    <div class="about-house">
                        <a href="{{route('admin.properties.show', ['slug' => $property->slug(), 'id' => $property->id])}}">
                            <h2>{{$property->title}}</h2>
                        </a>
                        <p class="description">Prix : {{number_format($property->price)}} XOF</p>
                        <p class="description">Aire : {{$property->surface}} m²</p>
                        <p class="description">Localisation : {{$property->price}}</p>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <form action="{{route('admin.properties.destroy', $property->id)}}" method="post"
                                  class="form-properties-opeations">
                                @csrf
                                @method("DELETE")
                                <a href="{{route('admin.properties.edit', $property->id)}}" class="operations-btn btn-blue">
                                    edit
                                </a>
                                <button type="submit" class="operations-btn btn-red">delete</button>
                            </form>
                        @endif

                    </div>
                </div>
            @empty

                <div class="alert alert-danger">
                    💔💨😓Aucune proprieté ne correspond à votre recherche ... veuillez en rechercher d'autre 👇
                </div>
            @endforelse
        </div>
    </section>
    <div class="search" style="position: fixed; bottom: 20px; padding: 0 10%">
        <form action="{{route('admin.properties.index')}}" class="forms"
              style="backdrop-filter: blur(2px); width: 100%">
            <input type="number" name="surface" id="surface" class="input" placeholder="Surface" style="width: 19%">
            <input type="number" name="rooms" id="rooms" class="input" placeholder="Nombre de chambre"
                   style="width: 19%">
            <input type="number" name="price" id="price" class="input" placeholder="Budget maximal" style="width: 19%">
            <input type="text" name="title" id="title" class="input" placeholder="Mot clef" style="width: 19%">
            <button class="btn" type="submit" style="width: 19%">rechercher</button>
        </form>
    </div>
@endsection
