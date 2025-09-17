<div class="lg:pl-56">
    <div
        class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-border bg-containerBackground px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
        <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <!-- Separator -->
        <div class="h-6 w-px bg-border lg:hidden" aria-hidden="true"></div>

        <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
            <form class="relative my-auto flex flex-1" action="" method="POST">
                @csrf

                <label for="search-field" class="sr-only">Search</label>
                <svg class="pointer-events-none absolute inset-y-0 left-0 h-full w-5" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
                <input id="search-field" name="search"
                    class="block h-full w-full bg-containerBackground border-0 py-0 pl-8 pr-0 placeholder focus:ring-0 sm:text-sm"
                    placeholder="Search..." type="search" name="search">
            </form>
            <div class="flex items-center gap-x-4 lg:gap-x-6">

                <!-- Separator -->
                <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-border" aria-hidden="true"></div>

                {{-- Admin Dropdown Wizard --}}
                @if ($aclService->adminCheck())
                    <x-dropdown id="adminMenu" align="left" width="96">
                        <x-slot name="trigger">
                            <button type="button"
                                class="-m-2.5 p-2.5 my-auto rounded-full @activeClass('admin*') hover:text-second hover:bg-second/20 transition duration-300 ease-in-out">
                                <span class="sr-only">View Wizards</span>
                                <svg class="size-6 shrink-0 font-bold" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-full h-48 flex flex-col bg-gradient-to-r from-containerBackground to-containerGradient">
                                {{-- header --}}
                                <div class="border-b border-border bg-secondGradient rounded-t-lg">
                                    <h2 class="text-sm p-3 font-semibold text-white">@lang('Admin Widget')</h2>
                                </div>

                                <div class="grid grid-cols-2 grid-rows-1 w-full h-full">

                                    {{-- User CRUD --}}
                                    <x-admin.user-management-tile />
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @endif

            </div>
        </div>
    </div>
