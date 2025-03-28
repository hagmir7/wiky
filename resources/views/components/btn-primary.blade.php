@props([
    'type' => 'submit',
    'text' => 'Submit',
    'class' => '',
])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "w-full flex justify-center py-3 px-6 border border-transparent rounded-full shadow-lg text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300 $class"
    ]) }}>
    {{ __($text) }}
</button>
