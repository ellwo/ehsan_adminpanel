@props(['disabled' => false, 'withicon' => false ,'withrighticon'=>false])

@php
$withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
$withiconClasses .= $withrighticon ? ' pr-11 ' : 'px-4';

@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => $withiconClasses . 'py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
focus:ring-primary-light focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-darker
dark:text-gray-300 dark:focus:ring-offset-dark',
])
!!}>
