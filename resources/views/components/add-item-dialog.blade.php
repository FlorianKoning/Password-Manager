@props(['catagories', 'catagorie'])

<div id="notification" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-background backdrop-blur-sm bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <form id="catagorie-form" method="POST" action="{{ route('items.store', $catagorie) }}">
          @csrf

        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-6 sm:w-full sm:max-w-md sm:p-6">
           
            <div>
                <div id="form-container" class="space-y-6">
                    {{-- header --}}
                    <header class="mb-10">
                        <h2 class="text-main text-lg font-medium">
                            {{ __('Profile Information') }}
                        </h2>
                
                        <p class="text-main mt-1 text-sm">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    {{-- title input --}}
                    <div>
                        <x-input-label class="text-main" for="title" :value="__('Title of the new item')" />
                        <x-text-input class="mt-1 block w-full text-main placeholder-main" id="title" name="title" type="text" :value="old('title')" placeholder="Type here title of item" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>


                    {{-- password input --}}
                    <div>
                        <div class="flex gap-2">
                          <x-input-label class="text-main" for="password" :value="__('Password for the item')" />
                          <button onclick="generatePassword()" type="button" class="flex gap-1 font-medium text-sm text-second hover:text-second/75 ease-in-out transition">
                            {{ __('Generate password') }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden size-6" id="checkId">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                          </button>
                        </div>
                        <x-text-input class="mt-1 block w-full text-main placeholder-main" id="password" name="password" type="text" :value="old('password')" placeholder="Type here your password" required autofocus autocomplete="password" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>


                    {{-- extra input --}}
                    <div>
                      <x-input-label class="text-main" for="extra" :value="__('Add extra element')" />
                      <div class="flex gap-2">
                        <input id="extra_title_intput" type="text" placeholder="Title of extra element" class="mt-1 block w-48 text-main placeholder-main border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <button onclick="createNewInputField()" onclick="" type="button" id="extra" onclick="" class="text-second">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                        </button>
                      </div>
                      {{-- input error message --}}
                      <x-catagorie-error />
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
              <button type="submit" class="transition ease-in-out delay-50 hover:scale-105 duration-300 inline-flex w-full justify-center rounded-md bg-second text-white px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Create</button>
              <button onclick="closeNotification()" type="button" class="transition ease-in-out delay-50 hover:scale-105 duration-300 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-main shadow-sm ring-1 ring-inset sm:col-start-1 sm:mt-0">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>