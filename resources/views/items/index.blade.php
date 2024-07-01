{{-- include javascript files --}}
<script type="text/javascript" src="{{asset('js/notification.js') }}"></script>
<script type="text/javascript" src="{{asset('js/catagorie-form.js') }}"></script>

<x-app-layout :catagories="$catagories">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('items.partials.index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>