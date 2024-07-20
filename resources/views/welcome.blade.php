@extends('navbar.navbar')

@section('content')
    <section id="hero">
        <div class="welcome">
            <h1>bloom houses</h1>
            <p class="welcome-para">
                “Bienvenue chez Bloom Houses ! Découvrez notre sélection exclusive de propriétés, des maisons de caractère aux appartements modernes. Trouvez votre chez-vous idéal parmi nos offres exceptionnelles.”
            </p>
            <div class="buttons">
                <a href="#search" class="btn">search</a>
                <a href="{{route('admin.properties.index')}}" style="color: black" class="btn">visit &rarr;</a>
            </div>
        </div>

    </section>

    <section class="title">
        <h3 id="search">search</h3>
    </section>

    <section class="search">
        <form action="{{route('admin.properties.index')}}" class="forms">
            <input type="number" name="surface" id="surface" class="input" placeholder="Surface">
            <input type="number" name="rooms" id="rooms" class="input" placeholder="Nombre de chambre">
            <input type="number" name="price" id="price" class="input" placeholder="Budget maximal">
            <input type="text" name="title" id="title" class="input" placeholder="Mot clef">
            <button class="btn" type="submit">rechercher</button>
        </form>
    </section>

    @if($properties->count() == 4)
        <section class="title">
            <h3 id="houses">Our features</h3>
        </section>
    <section class="four-properties-home">
        <div class="column1">
            <div class="column1-row1 column-row">
                <div class="img" style="background-image: url('{{$properties[0]->images[0]->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover"></div>
                <div class="desc">
                    <h3>
                        {{$properties[0]->title}}
                    </h3>
                    <P>
                        {{$properties[0]->price}} XOF
                    </P>
                    <a href="{{route("admin.properties.show", ["slug" => $properties[0]->slug(), "id" => $properties[0]->id])}}"
                       class="btn">more &rarr;</a>
                </div>
            </div>
            <div class="column1-row2 column-row">
                <div class="img" style="background-image: url('{{$properties[1]->images[0]->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover"></div>
                <div class="desc">
                    <h3>
                        {{$properties[1]->title}}
                    </h3>
                    <P>
                        {{$properties[1]->price}} XOF
                    </P>
                    <a href="{{route("admin.properties.show", ["slug" => $properties[1]->slug(), "id" => $properties[1]->id])}}"
                       class="btn">more &rarr;</a>
                </div>
            </div>
        </div>
        <div class="column2">
            <div class="column2-row1 column-row">
                <div class="img" style="background-image: url('{{$properties[2]->images[0]->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover"></div>
                <div class="desc">
                    <h3>
                        {{$properties[2]->title}}
                    </h3>
                    <P>
                        {{$properties[2]->price}} XOF
                    </P>
                    <a href="{{route("admin.properties.show", ["slug" => $properties[2]->slug(), "id" => $properties[2]->id])}}"
                       class="btn">more &rarr;</a>
                </div>
            </div>
            <div class="column2-row2 column-row">
                <div class="img" style="background-image: url('{{$properties[3]->images[0]->imageURL()}}'); background-attachment: scroll; background-position: center; background-size: cover"></div>
                <div class="desc">
                    <h3>
                        {{$properties[3]->title}}
                    </h3>
                    <P>
                        {{$properties[3]->price}} XOF
                    </P>
                    <a href="{{route("admin.properties.show", ["slug" => $properties[3]->slug(), "id" => $properties[3]->id])}}"
                       class="btn">more &rarr;</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="title">
        <h3 id="contact">contact us</h3>
    </section>

    <section class="contact-form">
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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="Email">
                <textarea id="message" placeholder="Entrer un message ..."
                          class=" form-control fs-6 @error('message') is-invalid @enderror" name="message"></textarea>
                <div class="submit">
                    <button type="submit" class="btn">contacter</button>
                </div>
            </form>
        </div>
        <div class="image-div">
            <img src="" alt="">
        </div>
    </section>
@endsection

