@props(['item_safety'])

<div class="min-w-80 min-h-24 rounded-lg">
    <div class="flex gap-6 border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
        <div class="mt-auto mb-auto text-white bg-second rounded-3xl p-2">   
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
            </svg>
        </div>
        <div> 
            <p class="mt-2 flex items-baseline gap-x-2">
                <span class="text-4xl font-semibold tracking-tight text-main">{{ round($item_safety) }}%</span>
            </p>  
            <div class="flex flex-row gap-2">
                <p class="text-sm font-medium leading-6 text-main">
                    Of items are not secure
                </p>
                <a href="" class="text-sm font-medium leading-6 text-main hover:text-second ease-in-out transition cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>