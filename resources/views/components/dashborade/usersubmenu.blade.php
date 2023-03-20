
<div x-show="open" x-ref="userMenu"
                    x-transition:enter="transition-all transform ease-out"
                    x-transition:enter-start="translate-y-1/2 opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transition-all transform ease-in"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-1/2 opacity-0"
                     @click.away="open = false"
                    @keydown.escape="open = false"
                    {{-- @class(['bottom-12 absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg  ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none', 'totop' => false])
                    @class(['top-12 ', 'totop' => true]) --}}

                   class="@if($totop) top-12 @else bottom-12 @endif absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg  ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                    tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">

                    <x-dropdown-link    class="block bg-primary text-primary-darker hover:bg-primary-darker hover:text-primary-light px-4 py-2 text-sm text-gray-700 transition-colors dark:text-light dark:hover:bg-primary"
                     href="{{-- route('profile') --}}" role="menuitem">

                        Your Profile
                    </x-dropdown-link>
                    <a @click="isSettingsPanelOpen=!isSettingsPanelOpen" href="#" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        Settings
                    </a>
                    <a href="#" role="menuitem"
                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </a>
                </div>
