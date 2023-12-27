<x-guest-layout>
    <x-slot name="pageTitle">{{ __('Connexion') }}</x-slot>

    <x-auth-card :title="__(' Bienvenue sur la plate-forme d\'administration de MySkul')"
                 :subtitle="__('Connectez-vous pour continuer')">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form class="pt-3" method="POST" action="{{ route('login') }}">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @csrf
            <!-- Email Address -->
            <x-input id="email" :placeholder="__('Adresse Mail')" type="email" name="email" :value="old('email')" required autofocus />
            <!-- Password -->
            <x-input id="password" :placeholder="__('Mot de passe')" type="password" name="password" required autocomplete="current-password" />

            <x-button type="submit">{{ __('Se Connecter') }}</x-button>

            <div class="my-2 d-flex justify-content-between align-items-center">
                <!-- Remember Me -->
                <div class="form-check">
                    <label for="remember_me" class="form-check-label text-muted">
                        <input id="remember_me" name="remember" type="checkbox" class="form-check-input">
                        {{ __('Rester connecté(e)') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="auth-link text-black" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
