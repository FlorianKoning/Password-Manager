<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" aria-live="assertive" class="pointer-events-none fixed inset-14 flex items-end px-4 py-6 sm:items-start">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">SuccesFully added new catagorie!</p>
            <p class="mt-1 text-sm text-gray-500">Your new catagorie has been added and is ready for use.</p>
            </div>
            <div class="ml-4 flex flex-shrink-0">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>