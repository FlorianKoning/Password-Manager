@props(['message'])

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" aria-live="assertive" class="pointer-events-none fixed inset-14 flex items-end px-4 py-6 sm:items-start">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Error when creating item!</p>
            <x-input-error class="mt-2" :messages="$message" />
            </div>
            <div class="ml-4 flex flex-shrink-0">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>