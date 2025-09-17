@if ($errors->get('redirectResponse') || session('redirectResponse'))
    <div id="loginError" aria-live="assertive"
        class="pointer-events-none fixed z-50 inset-0 flex items-center px-4 py-6 sm:items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-center transform transition-transform duration-500 ease-out translate-x-full animate-slide-in">
            <div
                class="pointer-events-auto w-full max-w-sm translate-y-0 transform rounded-lg bg-containerBackground opacity-100 shadow-lg outline outline-1 outline-black/5 transition duration-300 ease-out sm:translate-x-0  [@starting-style]:translate-y-2 [@starting-style]:opacity-0 [@starting-style]:sm:translate-x-2 [@starting-style]:sm:translate-y-0">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 text-red-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-textColor">Something Went Wrong!</p>
                            <p class="mt-1 text-sm text-gray-500">You do not have permission for this action!</p>
                        </div>
                        <div class="ml-4 flex shrink-0">
                            <button type="button" onclick="closeNotification('loginError')"
                                class="inline-flex rounded-md text-gray-400 hover:text-gray-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-second">
                                <span class="sr-only">Close</span>
                                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="size-5">
                                    <path
                                        d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    setTimeout(() => closeAlert('loginError'), 5000);
</script>