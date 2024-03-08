@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full mt-1 rounded-lg border-none bg-gray-100 pl-5 pt-5 shadow-sm']) !!}>
    {{ $slot }}
</textarea>
