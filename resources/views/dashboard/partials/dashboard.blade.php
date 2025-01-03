<section>
    <div class="flex justify-between flex-col">
        <!-- Stats -->
        <header>
            <div class="px-4 flex justify-between">
                {{-- secure items percentage --}}
                @if ($item_safety === 0 || $item_safety < 45)
                    <div class="min-w-80 min-h-24 rounded-lg">
                        <div class="flex gap-6 border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
                            <div class="mt-auto mb-auto text-white bg-second rounded-3xl p-2">   
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                                </svg>
                            </div>
                            <div> 
                                <p class="mt-2 flex items-baseline gap-x-2">
                                    <span class="text-5xl font-semibold tracking-tight text-second">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                </p>  
                                <div class="flex flex-row gap-2">
                                    <p class="text-sm font-medium leading-6 text-main">
                                        All items are secure
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else 
                   <x-not-secure-items :item_safety="$item_safety"/>
                @endif
                

                {{-- amount of categories  --}}
                <div class="min-w-80 min-h-24 rounded-lg">
                    <div class="flex gap-6 border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
                        <div class="mt-auto mb-auto text-white bg-second rounded-3xl p-2">   
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                        <div> 
                            <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-main">{{ $catagoie_count }}</span>
                            </p>  
                            <p class="text-sm font-medium leading-6 text-main">Number of categories</p>
                        </div>
                    </div>
                </div>

                {{-- amount of items  --}}
                <div class="min-w-80 min-h-24 rounded-lg">
                    <div class="flex gap-6 border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
                        <div class="mt-auto mb-auto text-white bg-second rounded-3xl p-2">   
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div> 
                            <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-main">{{ $items_count }}</span>
                            </p>  
                            <p class="text-sm font-medium leading-6 text-main">Number of items</p>
                        </div>
                    </div>
                </div>
                
                {{-- amount of favorites  --}}
                <div class="min-w-80 min-h-24 rounded-lg">
                    <div class="flex gap-6 border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
                        <div class="mt-auto mb-auto text-white bg-second rounded-3xl p-2">   
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                        </div>
                        <div> 
                            <p class="mt-2 flex items-baseline gap-x-2">
                                <span class="text-4xl font-semibold tracking-tight text-main">{{ $favorite_count }}</span>
                            </p>  
                            <p class="text-sm font-medium leading-6 text-main">Number of favorites</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</section>