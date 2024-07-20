@props(['items', 'catagorie', 'catagories'])

<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
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
                      <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                      <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
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
                        <a onclick="showEditDialog('edit_dialog', '{{ $item->id }}', '{{ $item->is_favorite }}')" class="hover:text-second ease-in-out transition cursor-pointer">
                          {{ __('Update') }}
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


{{-- Delete notification --}}
@if (session('succesDelete'))
  <x-deleteSucces />
@endif


{{-- Succes notification --}}
@if (session('succesMessage'))
    <x-formSucces />
@endif


{{-- Error notification --}}
@if ($errors->all() != null || session('errorMessage'))
  <x-formError :message="$errors->all()" />
@endif


{{-- delete warning --}}
<x-deleteWarning />


{{-- copy alert --}}
<x-copy-alert />


{{-- Add item dialog --}}
<x-add-item-dialog :catagories="$catagories" />

{{-- get-catagorie-form --}}
<x-catagorie-form :catagories="$catagories" />

  
{{-- Edit dialogs --}}
<x-edit-item-dialog />