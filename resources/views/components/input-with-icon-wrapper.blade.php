<div class="relative text-gray-500 focus-within:text-gray-900 dark:focus-within:text-gray-400">
    <div aria-hidden="true" class="absolute inset-y-0 flex items-center px-4 pointer-events-none">
        {{ $icon }}
    </div>
    {{ $slot }}

    @isset($righticon)

    <div class="absolute right-0 z-30 inset-y-1 flex items-center px-4 ">
        {{$righticon}}
    </div>
    @endisset
</div>
