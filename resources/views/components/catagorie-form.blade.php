@props(['catagories'])

<div id="catagorie_form_dialog" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div id="dialogBackground" class="fixed inset-0 backdrop-blur-sm bg-background bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <form id="get-catagorie-form" method="POST" action="">
          @csrf

        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-6 sm:w-full sm:max-w-md sm:p-6">
           
            <div>
                <div id="edit-form-container" class="space-y-6">
                    {{-- header --}}
                    <header class="mb-10">
                        <h2 class="text-main text-lg font-medium">
                            {{ __('choose catagorie.') }}
                        </h2>
                
                        <p class="text-main mt-1 text-sm">
                            {{ __("Here you can choose for what catagorie a new item will be created.") }}
                        </p>
                    </header>


                    {{-- Catagorie select --}}
                    <div>
                      <label for="select-catagorie" class="block text-sm font-medium leading-6 text-gray-900">Type of item</label>
                      <select id="select-catagorie" name="select-catagorie" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-second sm:text-sm sm:leading-6">
                        @foreach ($catagories as $value)
                          <option id="{{ $value->title }}" value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
              <button type="button" class="transition ease-in-out delay-50 hover:scale-105 duration-300 inline-flex w-full justify-center rounded-md bg-second text-white px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-second sm:col-start-2">Create</button>
              <button onclick="closeDialog('catagorie_form_dialog')" type="button" class="transition ease-in-out delay-50 hover:scale-105 duration-300 mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-main shadow-sm ring-1 ring-inset sm:col-start-1 sm:mt-0">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

