@props(['role'])

@switch($role)
    @case('admin')
        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-400/10 px-2 py-1 text-xs font-medium text-red-500">
            <svg viewBox="0 0 6 6" aria-hidden="true" class="size-1.5 fill-red-400">
                <circle r="3" cx="3" cy="3" />
            </svg>
            Admin
        </span>
        @break
    @case('user')
        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-green-400/10 px-2 py-1 text-xs font-medium text-green-500">
            <svg viewBox="0 0 6 6" aria-hidden="true" class="size-1.5 fill-green-400">
                <circle r="3" cx="3" cy="3" />
            </svg>
            User
        </span>
        @break
    @default
        
@endswitch