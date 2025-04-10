@props(['src' => null, 'alt' => 'Wikybook'])

@php
    $defaultSrc = file_exists($logo = storage_path('app/public/wiky.png'))
        ? asset('storage/wiky.png') . '?v=' . md5_file($logo)
        : asset('wiky.png');

    $imgSrc = $src ?? $defaultSrc;
@endphp

<img {{ $attributes->merge(['class' => '']) }}
     src="{{ $imgSrc }}"
     alt="{{ $alt }}"
     loading="lazy">
