@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-md bg-second p-2 text-sm font-semibold leading-6 text-white'
            : 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-second hover:text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
