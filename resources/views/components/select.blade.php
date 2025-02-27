@props(['disabled' => false])

<select {!! $attributes->merge(['class' => 'form-input']) !!}>
    {{ $slot }}
</select>
