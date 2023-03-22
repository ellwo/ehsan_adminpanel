
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

                       <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('تسجيل خروج') }}
                            </x-dropdown-link>
                        </form>

                </div>
