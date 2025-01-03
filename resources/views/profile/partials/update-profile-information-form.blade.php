<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    {{-- Authentication key --}}
    <form method="POST" action="{{ route('profile.reset') }}" class="mt-6">
        @csrf
        @method('post')

        <div class="space-y-6">
            <div class="flex">
                <div>
                    <input id="key" type="hidden" value="{{ Crypt::decrypt($key, false) }}">
        
                    <div class="flex gap-1 text-center">
                        <div  class="text-base text-gray-900">
                            {{ __("Authentication key: ") }}
                        </div>
                        <span class="text-main text-base font-bold">{{ mb_strimwidth(Crypt::decrypt($key, false), 0, 30, "...") }}</span>
                    </div>
                </div>
        
                <div class="ml-auto flex gap-2">
                    <button type="button" id="button" onclick="copyFunction()" class="bg-second px-2 text-sm text-[#fff] rounded-lg hover:bg-main ease-out transition">
                        Copy Key
                    </button>
                    
        
                    <button type="submit" id="button" onclick="copyFunction()" class="bg-second px-2 text-sm text-[#fff] rounded-lg hover:bg-main ease-out transition">
                        Reset Key
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input class="mt-1 block w-full text-main" id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input class="mt-1 block w-full text-main" id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>


        {{-- upload image --}}
        <div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <div class="w-full sm:col-span-3 sm:mt-0">
                  <div class="flex max-w-2xl justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <div class="flex justify-center">
                            <img class="h-32 w-32 rounded-md bg-[#fff]" src="{{ $profile_picture }}" alt="Profile picture">
                        </div>
                      <div class="mt-4 flex text-sm leading-6 text-gray-600">
                        <label for="file-upload" class="m-auto relative cursor-pointer rounded-md bg-white font-semibold text-second focus-within:outline-none focus-within:ring-2 focus-within:ring-second focus-within:ring-offset-2 hover:text-second">
                          <span>Upload a file</span>
                          <input id="file-upload" name="file-upload" type="file" class="sr-only">
                        </label>
                      </div>
                      <p class="text-xs leading-5 text-gray-600">PNG, JPG, up to 10MB</p>
                    </div>
                  </div>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('file-upload')" />  
        </div>
        


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
