<x-guest-layout>
    <section class="edit-section" style="flex-direction: column">

    <div class="mb-4 text-sm text-gray-600" style="height: 30px; width: 100%; text-align: center; padding: 75px;">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}" style="width: 80%;height: 125px; display: flex; align-items: start; justify-content: space-evenly; flex-direction: column">
            @csrf

            <!-- Email Address -->
            <div class="update-field" >
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-guest-layout>
