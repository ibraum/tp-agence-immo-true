<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="contact-form" style=" height: 350px; display: flex; align-items: center; justify-content: center; flex-direction: column">
        <div class="form-div" style="width: 60%; height: 310px">
            <form action="{{route('login')}}" method="post" style="height: 310px">
                @csrf
                @method('POST')

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="Email">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror "
                       name="password" placeholder="Password">
                <div class="submit">
                    <button type="submit" class="btn">Se connecter</button>
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center" style="display: flex; align-items: center; justify-content: center; gap: 15px; ">
                        <span class="ms-2 text-sm text-gray-600" style="white-space: nowrap">{{ __('Remember me') }}</span>
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    </label>
                </div>

                <div class="" style="display: flex; align-items: center; justify-content: center; gap: 15px; ">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="btn-submit">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
