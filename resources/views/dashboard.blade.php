

<x-dashe-layout>
    <div>
        <div class="mt-2">
            <!-- State cards -->
            <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-3">


                <!-- Orders card -->
                <div dir="rtl" class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        اجمالي التبرعات النقدية
                        </h6>
                        <div dir="rtl" class="flex my-2 flex-col">
                        <span class="text-md font-semibold">{{ $monetarydonation_ye."  "."ريال يمني" }}</span>
                        <hr>
                        <span class="text-md font-semibold">{{ $monetarydonation_ks."  "."ريال سعودي" }}</span>
                        <hr>
                        <span class="text-md font-semibold">{{ $monetarydonation_us."  "."دولار" }}</span>
                        <hr>
                    </div>
                        <a target="_blank" href="{{ route('monetarydonation') }}">
                        <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                           ادارة التبرعات النقدية
                        </span>

                        </a>
                    </div>
                    <div>
                        <span>
                            <span class="w-12 h-12 text-blue-500 dark:text-primary">
                            <svg class="flex-shrink-0 w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z"></path>
                                </g>
                            </svg>
                        </span>
                        </span>
                    </div>
                </div>
                <!-- Value card -->
                <!-- Users card -->
                <div  dir="rtl" class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <div class="flex space-y-2 flex-col">
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد التبرعات العينية
                        </h6>
                        <span class="text-xl font-semibold">{{ $materialdons_count }}</span>
                        <a href="{{ route('materialdonation') }}">
                        <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                            ادارة التبرعات العينية
                        </span>
                        </a>
                    </div>
                    <div>

                        <span>
                            <x-bi-bag-fill class="w-12 h-12 text-blue-400 dark:text-primary-dark" />
                        </span>

                    </div>
                </div>
                <div  dir="rtl" class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <div class="flex space-y-2 flex-col">
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد المتبرعين
                        </h6>
                        <span class="text-xl font-semibold">{{ $donor_count }}</span>
                        <a href="{{ route('depts') }}">
                        <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                            ادارة المتبرعين
                        </span>
                        </a>
                    </div>
                    <div>
                        <span>
                            <svg class="w-12 h-12 text-blue-500 dark:text-primary" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                    </div>
                </div>


                <!-- Tickets card -->
                {{-- <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد الحسابات التسويقية
                        </h6>
                        <span class="text-xl font-semibold">{{ $b_count }}</span>
                        <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                            ادارة الحسابات التسويقية
                        </span>
                    </div>
                    <div>
                        <span class="flex ">
                            <x-bi-shop class="w-12 h-12 text-primary" />

                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد الزيارات</h6>
                        <span class="text-xl font-semibold">{{ $v_count }}</span>

                    </div>
                    <div>
                        <span>
                            <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </span>
                    </div>
                </div>



                <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد الاقسام</h6>
                        <span class="text-xl font-semibold">{{ $d_count }}</span>

                    </div>
                    <div>
                        <span>
                            <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد الفئات</h6>
                        <span class="text-xl font-semibold">{{ $p_count }}</span>

                    </div>
                    <div>
                        <span>
                            <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد المدن</h6>
                        <span class="text-xl font-semibold"> {{ $c_count }} </span>

                    </div>
                    <div>
                        <span>
                            <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-white rounded-md m dark:bg-darker">
                    <div>
                        <h6
                            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                            عدد الاسواق</h6>
                        <span class="text-xl font-semibold">{{ $m_count }}</span>

                    </div>
                    <div>
                        <span>
                            <x-heroicon-s-view-grid class="w-12 h-12 text-gray-300 dark:text-primary-dark" />

                        </span>
                    </div>
                </div> --}}

            </div>



            <!-- Charts -->
            {{-- <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Bar chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500 dark:text-light">Last year</span>
                            <button class="relative focus:outline-none" x-cloak
                                @click="isOn = !isOn; $parent.updateBarChart(isOn)">
                                <div
                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                </div>
                                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                    :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- Chart -->
                    <div class="relative p-4 h-72">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Doughnut chart card -->
                <div class="bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Doughnut Chart</h4>
                        <div class="flex items-center">
                            <button class="relative focus:outline-none" x-cloak
                                @click="isOn = !isOn; $parent.updateDoughnutChart(isOn)">
                                <div
                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                </div>
                                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                    :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- Chart -->
                    <div class="relative p-4 h-72">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Two grid columns -->
            <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                <!-- Active users chart -->
                <div class="col-span-1 bg-white rounded-md dark:bg-darker">
                    <!-- Card header -->
                    <div class="p-4 border-b dark:border-primary">
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Active users right
                            now</h4>
                    </div>
                    <p class="p-4">
                        <span class="text-2xl font-medium text-gray-500 dark:text-light"
                            id="usersCount">0</span>
                        <span class="text-sm font-medium text-gray-500 dark:text-primary">Users</span>
                    </p>
                    <!-- Chart -->
                    <div class="relative p-4">
                        <canvas id="activeUsersChart"></canvas>
                    </div>
                </div>

                <!-- Line chart card -->
                <div class="col-span-2 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                    <!-- Card header -->
                    <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                        <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Line Chart</h4>
                        <div class="flex items-center">
                            <button class="relative focus:outline-none" x-cloak
                                @click="isOn = !isOn; $parent.updateLineChart()">
                                <div
                                    class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-darker">
                                </div>
                                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 ease-in-out transform scale-110 rounded-full shadow-sm"
                                    :class="{ 'translate-x-0  bg-white dark:bg-primary-100': !isOn, 'translate-x-6 bg-primary-light dark:bg-primary': isOn }">
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- Chart -->
                    <div class="relative p-4 h-72">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>


    </div>

</x-dashe-layout>
{{-- <x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="items-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        You're logged in!
    </div>
</x-app-layout> --}}
