<div class="lg:pl-72">
    <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-border bg-[#fff] px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
      <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>

      <!-- Separator -->
      <div class="h-6 w-px bg-border lg:hidden" aria-hidden="true"></div>

      <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
        <form class="relative flex flex-1" action="{{ route('dashboard.search') }}" method="POST">
          @csrf

          <label for="search-field" class="sr-only">Search</label>
          <svg class="pointer-events-none absolute inset-y-0 left-0 h-full w-5 text-border" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
          </svg>
          <input id="search-field" name="search" class="block h-full w-full bg-[#fff] border-0 py-0 pl-8 pr-0 text-border placeholder:text-border focus:ring-0 sm:text-sm" placeholder="Search..." type="search" name="search">
        </form>
        <div class="flex items-center gap-x-4 lg:gap-x-6">
            
          <!-- Separator -->
          <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-border" aria-hidden="true"></div>

          <!-- Profile dropdown -->
          <div class="flex">
            <img class="h-8 w-8 rounded-full bg-[#fff]" src="{{ $profile_picture }}" alt="Profile picture">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-border bg-[#fff] hover:text-[#349762] focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>
    
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
    
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
    
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
          </div>
          
        </div>
      </div>
    </div>