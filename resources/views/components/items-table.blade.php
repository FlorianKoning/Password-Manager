@props(['items', 'catagorie'])

<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ isset($catagorie['title']) ? $catagorie['title'] : 'All Items' }}</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the {{ isset($catagorie['title']) ? $catagorie['title'] : "item" }} passwords/accounts in your account including their title, catagorie, type.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button onclick="showDialog('catagorie_dialog')" type="button" class="rounded-md bg-second px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-main focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-second ease-in-out transition duration-300">Add item</button>
      </div>
    </div>
    <div class="mt-8 flow-root">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle px-4">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Catagorie</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-second">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                      <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" d="M3 6a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H3Zm1.75 2.5a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5ZM4 11.75a.75.75 0 0 1 .75-.75h3.5a.75.75 0 0 1 0 1.5h-3.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-second">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                      <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                      <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                    </svg>
                  </th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-second">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm4-7a.75.75 0 0 0-.75-.75h-6.5a.75.75 0 0 0 0 1.5h6.5A.75.75 0 0 0 12 8Z" clip-rule="evenodd" />
                    </svg>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                  {{-- content --}}
                  @foreach ($items as $item)
                    <tr>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $item->title }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->catagorie }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->type }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->created_at }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                        <a id="copyButton" onclick="getPassword('{{ $item->id }}')" class="hover:text-second ease-in-out transition cursor-pointer">
                          {{ __('Copy') }}
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                        <a onclick="showEditDialog('edit_dialog', '{{ $item->id }}')" class="hover:text-second ease-in-out transition cursor-pointer">
                          {{ __('Edit') }}
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
                        <a href="#" class="hover:text-second ease-in-out transition">
                          {{ __('Delete') }}  
                        </a>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


{{-- Error notification --}}
@if ($errors->all() != null)
  <x-formError :message="$errors->all()" />
@endif

    
{{-- copy alert --}}
<x-copy-alert />


  
{{-- Edit dialogs --}}
<x-edit-item-dialog />