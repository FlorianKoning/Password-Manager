<x-app-layout>
    <div class="py-2">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-2 sm:p-4 bg-containerBackground shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('admin.user.partials.index-table')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>