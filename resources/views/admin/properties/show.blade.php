@extends('navbar.navbar')

@section('content')
    <main class="show-main">
        <div class="">
            <div class="big-div" id="carrousel" data-image-number="">
                <div id="carrousel-div">
                @forelse( $property->images as $image)
                        <div id="" class="big-div-div" style="background-image: url('{{$image->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover">
                        </div>
                    @empty
                        <div id="" class="big-div-div" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                <h3>Oups ! 😅</h3>
                                <p>Pas d'image disponible <b>Contactez nous pour plus d'information</b></p>
                        </div>
                    @endforelse
                </div>
                <div class="next directions" id="next">&lt;&gt;</div>
            </div>
            <div class="property-infos">
                <h4 class="col-6" style="font-size: 1.5rem">{{$property->title}}</h4>
                <span
                    class="">{{$property->surface}} m² - {{$property->rooms}} rooms - {{$property->bedrooms}} bedrooms</span>
                <h3 class=""
                    style="padding: 2px 10px; border-radius: 2px; background-color: aliceblue; border: 1px solid grey;">{{\Illuminate\Support\Number::format($property->price)}}
                    XOF</h3>
                <div class="property-caract">
                    <table class="table">
                        <h2>
                            Caractéristiques
                        </h2>
                        <thead>
                        <tr class="">
                            <th class="column1 column"></th>
                            <th class="column2 column" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <th class="column" scope="row">Adresse</th>
                            <td class="column">{{$property->add²ress}}</td>
                        </tr>
                        <tr class="row-caract">
                            <th class="column" scope="row">Surface habitable</th>
                            <td class="column">{{$property->surface}} m²</td>
                        </tr>
                        <tr class="">
                            <th class="column" scope="row">Pièce(s)</th>
                            <td class="column">{{$property->rooms}}</td>
                        </tr>
                        <tr class="row-caract">
                            <th class="column" scope="row">Chambre(s)</th>
                            <td class="column">{{$property->bedrooms}}</td>
                        </tr>
                        <tr class="">
                            <th class="column" scope="row">Etage(s)</th>
                            <td class="column">{{$property->floor}}</td>
                        </tr>
                        <tr class="row-caract">
                            <th class="column" scope="row">Chauffage</th>
                            <td class="column"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="" style="width: 100%">
                    <h2>
                        Spécificités
                    </h2>
                    <div class="card w-100 rounded-1 mt-4" style="width: 100%">
                        <ul class="" style="width: 100%; list-style: none;">
                            @forelse($property->options as $option)
                                <li class="" style="margin-bottom: 5px; width: 100%; padding: 5px 0px; background-color: rgba(112,177,238,0.27); border: 1px solid rgb(0,133,255); border-radius: 4px;">{{$option->name}}</li>
                            @empty
                                <span class=""
                                      style="color: red; background-color: rgba(255, 0, 0, 0.1); padding: 5px 10px; border-radius: 2px; border: 1px dotted red;">💔😕Pas de spécificité associé à cet immeuble ...</span>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="w-100" style="width: 18rem; font-size: 1.2rem;">
            Etes-vous intéressés par ce bien ?
        </div>
        <section class="contact-form" style="width: 100%; padding: 10px 0;">
            <div class="form-div">
                <form action="{{route('properties.contact')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror "
                           name="firstname" placeholder="Nom">
                    <input type="text" id="surname" class="form-control @error('surname') is-invalid @enderror"
                           name="surname" placeholder="Prénom">
                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel"
                           placeholder="Téléphone">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Email">
                    <textarea id="message" placeholder="Entrer un message ..."
                              class=" form-control fs-6 @error('message') is-invalid @enderror"
                              name="message"></textarea>
                    <div class="submit">
                        <button type="submit">contacter</button>
                    </div>
                </form>
            </div>
            <div class="image-div">
                <img src="" alt="">
            </div>
        </section>
    </main>
@endsection
