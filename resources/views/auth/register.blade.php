<x-guest-layout>
    <section class="contact-form">
        <div class="form-div">
            <form action="{{route('register')}}" method="post">
                @csrf
                @method('POST')
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror "
                       name="name" placeholder="Nom">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" placeholder="Email">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                       placeholder="Mot de passe">
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                       placeholder="Confirmation de mot de passe">
                <div class="submit">
                    <button type="submit" class="btn">Soumettre les informations</button>
                </div>
                <div class="flex items-center justify-end mt-4" style="display: flex; align-items: center; justify-content: center; gap: 20px">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="btn-submit">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="image-div">
            <img src="" alt="">
        </div>
    </section>
</x-guest-layout>
