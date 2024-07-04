{{-- include javascript files --}}
<script type="text/javascript" src="{{asset('js/dialog.js') }}"></script>
<script type="text/javascript" src="{{asset('js/ajax.js') }}"></script>


<x-app-layout :catagories="$catagories">
    {{-- items table --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('catagories.partials.index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- Add item dialog --}}
<x-add-item-dialog :catagories="$catagories" :catagorie="$catagorie" />