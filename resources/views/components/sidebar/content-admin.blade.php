
<h2>
    مرحبا ايه الادمن
</h2>

<hr>
<x-sidebar.link title="ادارة المستخدمين والصلاحيات والامتيازات" href="{{ route('admin.users.index') }}" :isActive="request()->routeIs('mange.services')">
    <x-slot name="icon">
        <x-bi-lock-fill class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الاستفسارات والشكاوى" href="{{ route('post.show_con') }}" :isActive="request()->routeIs('mange.services')">
    <x-slot name="icon">
        <x-bi-inbox class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>


<x-sidebar.link title="ادارة الحسابات التسويقية" href="{{ route('admin.manage.bussinses') }}" :isActive="request()->routeIs('admin.manage.bussinses')">
    <x-slot name="icon">
        <x-bi-shop class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة المنتجات المعروضة في النظام" href="{{ route('admin.manage.products') }}" :isActive="request()->routeIs('admin.manage.products')">
    <x-slot name="icon">
        <x-bi-bag class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الخدمات المعروضة في النظام" href="{{ route('admin.manage.services') }}" :isActive="request()->routeIs('admin.manage.services')">
    <x-slot name="icon">
        <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z"></path>
            </g>
        </svg>
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة  المدن" href="{{ route('show_city') }}" :isActive="request()->routeIs('show_city')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الاسواق" href="{{ route('show_markts') }}" :isActive="request()->routeIs('show_markts')">
    <x-slot name="icon">
        <x-bi-shop class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الاقسام" href="{{ route('show_Department') }}" :isActive="request()->routeIs('show_Department')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة الفئات" href="{{ route('show_Parts') }}" :isActive="request()->routeIs('show_Parts')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة  الاعلانات" href="{{ route('ad') }}" :isActive="request()->routeIs('ad')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link title="ادارة خدماتي المعروضة" href="{{ route('mange.services',['type'=>'all']) }}" :isActive="request()->routeIs('mange.services')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>
<hr>
