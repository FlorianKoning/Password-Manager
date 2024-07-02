<!-- Global notification live region, render this permanently at the end of the document -->
<div id="copyAlert" aria-live="assertive" class="hidden file:selection:pointer-events-none fixed inset-12 flex items-end px-4 py-6 sm:items-start sm:p-6">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
      <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
        <div class="p-4">
          <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
            </div>
            <div class="ml-3 w-0 flex-1 pt-0.5">
              <p class="text-sm font-medium text-gray-900">Copied password!</p>
              <p class="mt-1 text-sm text-gray-500">You have copied a password. Try not to share your password.</p>
            </div>
            <div class="ml-4 flex flex-shrink-0">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>