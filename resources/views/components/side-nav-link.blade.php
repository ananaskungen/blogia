@props(['active'])

@php
$classes = ($active ?? false)
            ? ' bg-blue-600'
            : 'block py-2.5 px-4 rounded hover:bg-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->class(['block py-2.5 px-4 rounded'])->merge(['class' => $classes]) }} class="block py-2.5 px-4 rounded hover:bg-blue-700 transition duration-150 ease-in-out">{{ $slot }}</a> 