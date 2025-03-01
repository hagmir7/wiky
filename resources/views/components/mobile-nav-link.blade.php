<a {{ $attributes->merge(['class' => "font-semibold " . ($active ? ' text-primary-500 ': ' text-gray-700 ')]) }}>
    {{ $slot }}
</a>
