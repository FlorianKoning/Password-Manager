{{-- include javascript files --}}
<script type="text/javascript" src="{{asset('js/ajax.js') }}"></script>
<script type="text/javascript" src="{{asset('js/dialog.js') }}"></script>


<x-app-layout :catagories="$catagories">
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    {{-- table --}}
                    <section>
                        <x-items-table :catagories="$catagories" :items="$items"/>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


