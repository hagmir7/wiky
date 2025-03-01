<a {{ $attributes->merge(['class' => "lg:hover:text-primary-500 font-semibold " . ($active ? ' text-primary-500 underline decoration-slice underline-offset-4 ': ' text-gray-700 ')]) }}>
    {{ $slot }}
</a>
