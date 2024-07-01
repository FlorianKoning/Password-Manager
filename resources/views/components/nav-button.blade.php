<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-[#262D3D] px-2 text-base text-[#fff] rounded-lg hover:bg-[#349762] ease-out transition']) }}>
    {{ $slot }}
</button>
