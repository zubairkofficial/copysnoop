@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-2 w-full bg-gray-100 h-12 pl-5  border-none rounded-lg shadow-sm']) !!}>
    {{ $slot }}
</select>
