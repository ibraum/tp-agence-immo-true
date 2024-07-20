<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <title>hero</title>
</head>
<body>
<header>
    <nav>
        <a id="logo" style="text-decoration: none; color: black;" href="{{route('welcome')}}">
            bloom.
        </a>
        <ul>
            <li class="navigation">
                <a href="{{route('admin.properties.index')}}">properties</a>
            </li>

            <li class="navigation">
                <a href="{{route('admin.options.index')}}">options</a>
            </li>

            <li class="navigation">
                <a href="#search">search</a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::check())
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf<button type="submit" class="btn" style="background-color: rgba(255, 0, 0, 0.1); border: 1px solid red; color: red; padding: 2.5px 10px; font-size: .9rem;">Logout</button>
                        @method('DELETE')
                    </form>
                </li>
            @else
                <li>
                    <a href="{{route('login')}}"><button class="btn-none">log in</button></a>
                </li>

                <li>
                    <a href="{{route('register')}}"><button class="btn">Sign up</button></a>
                </li>
            @endif
        </ul>
    </nav>
</header>
@if(session('success'))
    <section class="success" style="display: flex; align-items: center; justify-content: center; width: 1OO%; height: 50px; border: 1px solid rgba(0, 255, 0, 0.9); background-color: rgba(0, 255, 0, 0.2); margin: 0 15% 30px 15%; border-radius: 4px; color: rgb(0, 0, 0)">
        {{session('success')}}
    </section>
@endif
<main>

@yield('content')
</main>

<footer>
    <div>&copy; copyright</div>
    <div>@ibraum, Juillet 2024</div>
</footer>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}});
        new TomSelect('checkbox');
    </script>
</body>
</html>
