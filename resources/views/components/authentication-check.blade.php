@props(['catagories', 'catagorie'])

<div id="auth_check" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-background backdrop-blur-sm bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <form id="auth_form" method="POST" action="{{ route('auth_check') }}">
          @csrf

        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-6 sm:w-full sm:max-w-md sm:p-6">
           
            <div>
                <div class="space-y-6 max-w-xl">
                    {{-- header --}}
                    <header class="mb-10">
                        <div class="flex">

                          <h2 class="text-main text-lg font-medium">
                            {{ __('Authentication check') }}
                          </h2>
                        </div>

                        <p class="text-main mt-1 text-sm">
                            {{ __("We need your authentication key to check if you have the rights to vue or change this data.") }}
                        </p>
                    </header>

                    {{-- Authentication key input --}}
                    <div>
                        <x-input-label class="text-main" for="auth_key" :value="__('Authentication key')" />
                        <x-text-input class="mt-1 block w-full text-main placeholder-main" id="auth_key" name="auth_key" type="text" :value="old('auth_key')" placeholder="Fill in your authentication key" required autofocus autocomplete="auth_key" />
                        <x-input-error class="mt-2" :messages="$errors->get('auth_key')" />
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
              <button type="submit" class="transition ease-in-out delay-50 hover:scale-105 duration-300 inline-flex w-full justify-center rounded-md bg-second text-white px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Create</button>
              <button onclick="closeDialog('auth_check')" type="button" class="transition ease-in-out delay-50 hover:scale-105 duration-300 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-main shadow-sm ring-1 ring-inset sm:col-start-1 sm:mt-0">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>