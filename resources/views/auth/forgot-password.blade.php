<x-guest-layout>
    <!-- Page Title -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">{{ __('Forgot Password?') }}</h2>
        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus icon="envelope" iconPosition="left" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-4">
            <x-primary-button class="w-full justify-center" icon="paper-airplane" iconPosition="left">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4">
            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-1.5 text-sm text-sacli-green-600 hover:text-sacli-green-700 font-medium transition-colors">
                <x-icon name="arrow-left" size="xs" />
                {{ __('Back to login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
