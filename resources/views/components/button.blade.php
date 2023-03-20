@props(['variant' => 'primary', 'iconOnly' => false, 'srText' => '', 'href' => false, 'size' => 'sm', 'disabled' => false, 'pill' => false, 'squared' => false])

@php

    $baseClasses = 'inline-flex items-center transition-colors  select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2';

    switch ($variant) {
        case 'primary':
            $variantClasses = 'bg-primary text-primary-dark hover:text-primary-light  dark:hover:bg-primary-darker hover:bg-primary-dark focus:ring-primary-light';
        break;
        case 'secondary':
            $variantClasses = 'bg-primary-dark text-gray-100 hover:bg-gray-400 hover:text-darker focus:ring-primary dark:text-light dark:bg-darker dark:hover:bg-light dark:hover:text-darker';
        break;
        case 'success':
            $variantClasses = 'bg-green-500 text-white hover:bg-green-600 focus:ring-green-500';
        break;
        case 'danger':
            $variantClasses = 'bg-danger text-white hover:text-darker focus:ring-red-500';
        break;
        case 'warning':
            $variantClasses = 'bg-yellow-500 text-white hover:bg-yellow-600 focus:ring-yellow-500';
        break;
        case 'info':
            $variantClasses = 'bg-info text-white hover:bg-cyan-600 focus:ring-cyan-500';
        break;
        case 'black':
            $variantClasses = 'bg-black text-gray-300 hover:text-white hover:bg-gray-800 focus:ring-black dark:hover:bg-dark-eval-3';
        break;
        case 'goset':
        $variantClasses='bg-transparent  border-b border-dark dark:border-light';
        break;
        case 'gosit':
        $variantClasses='bg-transparent  hover:text-primary dark:hover:text-primary dark:text-light';
        break;

        default:
            $variantClasses = 'bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500';
    }

    switch ($size) {
        case 'sm':
            $sizeClasses = $iconOnly ? 'p-1.5' : 'px-2.5 py-1.5 text-sm';
        break;
        case 'base':
            $sizeClasses = $iconOnly ? 'p-2' : 'px-4 py-2 text-base';
        break;
        case 'lg':
        $sizeClasses = $iconOnly ? 'p-2' : 'px-4 py-2 text-base';

        default:
            $sizeClasses = $iconOnly ? 'p-3' : 'px-5 py-1 text-xl';
        break;
    }

    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $variantClasses;

    if(!$squared && !$pill){
        $classes .= ' rounded-md';
    } else if ($pill) {
        $classes .= ' rounded-full';

    }

@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        @if($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </a>
@else
    <button   {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
        @if($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </button>
@endif
