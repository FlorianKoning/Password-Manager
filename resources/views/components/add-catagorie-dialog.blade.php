@props(['catagories', 'catagorie'])

<div id="create_catagorie" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-background backdrop-blur-sm bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <form id="catagorie-form" method="POST" action="">
          @csrf

        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-6 sm:w-full sm:max-w-md sm:p-6">
           
            <div>
                <div class="space-y-6 max-w-xl">
                    {{-- header --}}
                    <header class="mb-10">
                        <h2 class="text-main text-lg font-medium">
                            {{ __('Add new categorie') }}
                        </h2>
                
                        <p class="text-main mt-1 text-sm">
                            {{ __("This will add a new catagorie to your account where you can store items.") }}
                        </p>
                    </header>

                    {{-- New Catagorie title --}}
                    <div>
                        <x-input-label class="text-main" for="title" :value="__('Title of the new categorie')" />
                        <x-text-input class="mt-1 block w-full text-main placeholder-main" id="title" name="title" type="text" :value="old('title')" placeholder="Type here title of the categorie" required autofocus autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
              <button type="submit" class="transition ease-in-out delay-50 hover:scale-105 duration-300 inline-flex w-full justify-center rounded-md bg-second text-white px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Create</button>
              <button onclick="closeDialog('create_catagorie')" type="button" class="transition ease-in-out delay-50 hover:scale-105 duration-300 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-main shadow-sm ring-1 ring-inset sm:col-start-1 sm:mt-0">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>