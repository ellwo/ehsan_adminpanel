@props(['status'])

@if ($status)

<div x-data="{openstatus:true}" x-show="openstatus" class="fixed top-0 right-0 left-0 bottom-0" @click="openstatus=false">
    <div   x-transition  class="absolute flex flex-col transition-all decoration-slice bg-white  justify-end  top-1/2 z-20 right-24  border-success border rounded-md    ">


        <div class="flex relative space-x-4 justify-end">

        @if(session('tital'))
        <h4 class="font-bold dark:text-dark">{{ session('tital') }}</h4>
        @endif

        <x-button @click="openstatus=!openstatus" type="button" variant='danger' class="" iconOnly>
            <x-heroicon-o-x class="w-4 h-4 "/>

        </x-button>
        </div>
        <hr>
        <p class=" text-success p-4 h-full">
     {{ $status }}
        </p>
     </div>
</div>
@endif
