<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">
{{--
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link> --}}


<x-sidebar.link title="لوحة التحكم" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
    <x-slot name="icon">
        <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>
</x-sidebar.link>




{{-- @role('admin')
       <x-sidebar.content-admin />
@endrole
 --}}






<x-sidebar.link title="ادارة المستخدمين" href="{{ route('admin.users.index')}}" :isActive="request()->routeIs('admin.users.index')||request()->routeIs('admin.users.index')">
    <x-slot name="icon">
        <x-bi-person class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة المتبرعين" href="{{ route('depts')}}" :isActive="request()->routeIs('depts')">
    <x-slot name="icon">
        <x-bi-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>


<x-sidebar.link title="ادارة التبرعات النقدية " href="{{ route('monetarydonation')}}" :isActive="request()->routeIs('monetarydonation')">
    <x-slot name="icon">

        <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z"></path>
            </g>
        </svg>
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة التبرعات العينية " href="{{ route('materialdonation')}}" :isActive="request()->routeIs('materialdonation')">
    <x-slot name="icon">

        <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z"></path>
            </g>
        </svg>
    </x-slot>

</x-sidebar.link>










</x-perfect-scrollbar>
