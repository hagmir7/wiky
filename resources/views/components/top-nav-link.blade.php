<a {{ $attributes->merge(['class' => "lg:hover:text-gray-200 text-sm font-semibold " . ($active ? ' text-primary-800 underline decoration-slice underline-offset-4 ': ' text-white  ')]) }}>
    {{ $slot }}
</a>
