<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center">
                <input id="key" type="hidden" value="{{ $key }}">

                <div  class="text-sm p-6 text-center text-gray-900">
                    {{ __("User key: ") }}<span class="font-bold">{{ mb_strimwidth($key, 0, 50, "...") }}</span>
                </div>

                <button onclick="copyFunction()">Copy Key</button>
            </div>
        </div>
    </div>
</x-app-layout>


<script>

    function copyFunction() {
        var copyText = document.getElementById("key");

        copyText.select();
        console.log(copyText.value);

        navigator.clipboard.writeText(copyText.value);
    }
    
</script>
