<a href="{{ route('admin.users.index') }}">
    <div id="UserTile" class="flex flex-col justify-center gap-2 w-full h-full border-r hover:bg-hover border-border transition duration-300 ease-in-out">
        <div id="UserLogo" class="mx-auto bg-symGreen/20 rounded-full p-3 text-symGreen">
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>

        <div class="flex flex-col text-center">
            <h2 class="text-sm font-semibold">@lang("User Management")</h2>
        </div>
    </div>
</a>