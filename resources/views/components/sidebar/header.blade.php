<div class="flex items-center justify-between flex-shrink-0 px-3">
    <!-- Logo -->
    <a href="#" class="inline-flex items-center gap-2">
        <x-sm-application-logo class="w-12" aria-hidden="true"
          />
        <span class="sr-only">K UI Logo</span>
    </a>

    <!-- Toggle button -->
    <x-button type="button" iconOnly srText="Toggle sidebar" variant="secondary"
        x-show="isSidebarOpen || isSidebarHovered" @click="isSidebarOpen = !isSidebarOpen">
        <x-icons.menu-fold-right x-show="!isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />
        <x-icons.menu-fold-left x-show="isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />
        <x-heroicon-o-x aria-hidden="true" class="w-6 h-6 lg:hidden" />
    </x-button>
</div>
