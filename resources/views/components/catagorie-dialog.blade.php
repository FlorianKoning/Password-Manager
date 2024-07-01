@props(['catagories'])

<div id="notification" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-background backdrop-blur-sm bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <form id="catagorie-form" method="GET" action="#">
        @csrf
        @method('get')

        <div class="relative transform overflow-hidden rounded-lg bg-main px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-10 sm:w-full sm:max-w-xl sm:p-6">
            <div>
              <h1 class="text-xl bold text-center">Choose the catagorie</h1>  
              <div class="mt-3 text-center sm:mt-5">
                 

                  <div>
                    <label for="catagorie" class="float-start block text-sm font-medium leading-6">Catagories</label>
                    <select id="catagorie" name="catagorie" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-second sm:text-sm sm:leading-6">
                      @foreach ($catagories as $catagorie)
                          <option  value="{{ $catagorie['id'] }}">{{ $catagorie['title'] }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
              <button onclick="redirectActino('{{ $_SERVER['HTTP_HOST'] }}')" type="button" class="inline-flex w-full justify-center rounded-md bg-second text-white px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Create</button>
              <button onclick="closeNotification()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-main shadow-sm ring-1 ring-inset sm:col-start-1 sm:mt-0">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>