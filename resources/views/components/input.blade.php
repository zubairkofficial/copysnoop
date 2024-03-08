@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm bg-gray-100 h-12 pl-5 mt-2 w-full border-none']) !!}>
