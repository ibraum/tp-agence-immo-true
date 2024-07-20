@extends('navbar.navbar')

@section('content')
    <div class="search">
        <form action="" method="post">
            <input type="number" placeholder="Surface minimum">
            <input type="number" placeholder="Pièce minimum">
            <input type="number" placeholder="Budget maximal">
            <input type="text" placeholder="Mot clef">
            <button type="submit" class="btn-normal">Rechercher</button>
        </form>
    </div>
@endsection
