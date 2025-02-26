@props(['active'])

@php
    $classes = $active ?? false ? 'mobile-nav-link mobile-nav-link-active' : 'mobile-nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
