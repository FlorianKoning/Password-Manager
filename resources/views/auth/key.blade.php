<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('key', $user->id) }}">
        @csrf

        <!-- Key -->
        <div>
            <x-input-label for="key" :value="__('Insert Encryption key')" class="text-white" />
            <x-text-input id="key" class="block mt-1 w-full" type="text" name="key" :value="old('key')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('key')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3 bg-second hover:bg-white hover:text-main">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
