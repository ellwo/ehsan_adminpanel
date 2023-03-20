
<div x-data="{show_resave_model:false}"
 {{-- x-data="{showform:{{$showform}}}" --}}
 >
 <div class="relative ">



    <div x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-500 ease-in-out"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-darker opacity-10 z-30"
    x-show="show_resave_model">

</div>


    <div x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition duration-500 ease-in-out"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"

    @click.away="show_resave_model=false" x-show="show_resave_model" class="fixed z-40 flex flex-col p-8 space-y-4 bg-white border rounded-md text-darker top-24 left-1/2 right-1/5">
        <span class="w-full text-3xl font-bold text-right text-danger">ملاحظة</span>
        <hr>
        انت على وشك وضع هذا التبرع في حالة الاستلام !
        <hr>
        <div wire:ignore.self class="flex flex-col p-2">
            <x-label value="ادخل ملاحظات الاستلام "/>
            <textarea wire:model.lazy="r_note" class="rounded-md dark:text-white dark:bg-darker text-dark bg-white p-2" name="" id="" cols="30" rows="5"></textarea>

        </div>
        <div class="flex justify-between space-x-2">
  <x-button variant='success' @click='show_resave_model=false'
  wire:click='makedonresave'>تأكيد العملية</x-button>
  <x-button variant='danger' x-on:click="show_resave_model=false;$wire.set('edite_don',-1)" > الغاء</x-button>
        </div>
    </div>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-auth-validation-errors class="mb-4" :errors="$errors" />



 </div>





    <div class=" overflow-x-auto  w-full flex items-center justify-center  font-sans ">
        <div class="w-full lg:w-5/6">
            <div class="rounded-t bg-white dark:bg-darker min-h-screen mb-0 px-4 py-3 border-0">

                <div class="">



                    {{-- <x-button variant="info" class="mx-auto" href="{{ route('depts.create') }}">
                        اضافة قسم جديد
                        <x-heroicon-s-plus class="h-8 w-8"/>
                    </x-button> --}}

                    {{-- <x-button variant="info" class="mx-auto" href="{{ route('donor.pdf') }}">
                        تنزيل PDF
                        <x-heroicon-s-plus class="h-8 w-8"/>
                    </x-button> --}}



                </div>
                <div  x-data="{sh:false}" dir="rtl" class="flex flex-wrap items-center">
                    <div class=" text-5xl w-full sm:px-4 max-w-full flex-grow sm:flex-1">
                        <h3 class="font-semibold text-4xl relative mb-4 flex  text-blueGray-700">
                            {{__('التبرعات العينية')}}


                        </h3>

                        <x-button  x-show="false" onclick="printContent('printTable','{{ asset('css/app.css') }}')" class='block w-32' variant="info">
                            طباعة
                            <x-heroicon-o-printer  class="w-4 h-4"/>
                           </x-button>
                        {{-- <div class="flex mt-4 dark:text-white flex-col ">


                            {{$donors->links()}}
                        </div> --}}


                    </div>



{{--

                    <div class="flex mt-4 dark:text-white flex-col ">


                        {{$donors->links()}}
                    </div> --}}

                    <div>
                    </div>

                    <div class="flex mx-auto transition-shadow shadow">
                        <div class="relative mx-auto flex flex-col items-center space-y-2 ">


                        <div x-data="{ dropdownOpen: false, name:'جميع المحصلين' }" class="relative">

                            <div class="flex space-x-4 justify-between">
                            <x-button @click="dropdownOpen = !dropdownOpen" variant="goset"   >
                                <x-heroicon-s-arrow-down class="w-5 h-5"/>
                                <span x-text="' عرض التبرعات العينية حسب المحصل : '+name"></span>

                            </x-button>

                            </div>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed bg-slate-400 opacity-20 inset-0 z-10 w-full h-full"></div>

                            <div x-show="dropdownOpen" class="absolute right-0 z-50 w-64 mt-2 h-64 overflow-y-scroll  bg-white rounded-md shadow-xl">

                                <a @click="$wire.setWho('-1,users')"
                                    class="w-full flex flex-col px-4 @if ($user_id==-1)
                                        bg-gray-300
                                    @endif py-2 text-sm text-gray-800 cursor-pointer border-b hover:bg-gray-200"
                                    >
                        جميع المحصلين
                                </a>

                                @foreach ($users as $buss)
                                <a

                                @if ($user_id!=$buss->id)
                                @click="$wire.setWho({{ $buss->id }},'user_id'); dropdownOpen = false;name='{{ $buss->name }}'"

                                @else

                                x-init="name='{{ $buss->name }}'"

                                @endif
                                    class="w-full flex flex-col px-4
                                    @if ($user_id==$buss->id)

                                        bg-gray-300
                                    @endif py-2 text-sm text-gray-800 cursor-pointer border-b hover:bg-gray-200" value="{{ $buss->id }}"
                                    >
                                    {{ $buss->name }}
                                    <span class="p-1 text-xs rounded-full text-info">{{ "@".$buss->username }} </span>
                                    <span class="p-1 text-xs rounded-full text-info">{{ $buss->phone }} </span>

                                </a>
                                @endforeach

                            </div>
                          </div>



                          <br>

                        <div x-data="{ dropdownOpen: false, name:'جميع المتبرعين' }" class="relative">

                            <div class="flex space-x-4 justify-between">
                            <x-button @click="dropdownOpen = !dropdownOpen" variant="goset"   >
                                <x-heroicon-s-arrow-down class="w-5 h-5"/>
                                <span x-text="' عرض التبرعات العينية حسب المتبرع : '+name"></span>

                            </x-button>

                            </div>

                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed bg-slate-400 opacity-20 inset-0 z-10 w-full h-full"></div>

                            <div x-show="dropdownOpen" class="absolute right-0 z-50 w-64 mt-2 h-64 overflow-y-scroll  bg-white rounded-md shadow-xl">

                                <a @click="$wire.setWho('-1,users')"
                                    class="w-full flex flex-col px-4 @if ($user_id==-1)
                                        bg-gray-300
                                    @endif py-2 text-sm text-gray-800 cursor-pointer border-b hover:bg-gray-200"
                                    >
                        جميع المتبرعين
                                </a>

                                @foreach ($donors as $buss)
                                <a




                                @if ($user_id!=$buss->id)
                                @click="$wire.setWho({{ $buss->id }},'donor_id'); dropdownOpen = false;name='{{ $buss->name }}'"

                                @else

                                x-init="name='{{ $buss->name }}'"
                                @endif
                                    class="w-full flex flex-col px-4
                                    @if ($user_id==$buss->id)

                                        bg-gray-300
                                    @endif py-2 text-sm text-gray-800 cursor-pointer border-b hover:bg-gray-200" value="{{ $buss->id }}"
                                    >
                                    {{ $buss->name }}
                                    <span class="p-1 text-xs rounded-full text-info">{{ "@".$buss->username }} </span>
                                    <span class="p-1 text-xs rounded-full text-info">{{ $buss->phone }} </span>

                                </a>
                                @endforeach

                            </div>
                          </div>


                        </div>
                    </div>

                        <div class="w-full top-0 right-0 bottom-0 z-30 bg-white bg-opacity-50 fixed" wire:loading
                              >
                            <div class="w-full h-4 bg-blue-900 mt-16 rounded animate-pulse top-10 bottom-0 my-auto"></div>
                        </div>

                    <div  id="printTable" class="bg-white text-right overflow-x-auto relative  dark:text-white w-full shadow-md rounded my-6">


                        <div >
                    <div x-show="sh" class="m-8 p-8 bg-white rounded-md border shadow-md flex flex-col" >
                        <div  dir="rtl" class="text-right flex flex-col">

                            <div class="flex">
                            <span class="">التاريخ:   </span><span class="font-bold">{{ date(now()) }}</span>
                        </div>
                            <span class="font-bold">تم طابعة هذا المستند بواسطة {{ request()->user()->name."|".request()->user()->email }}</span>
                        </div>


                    </div>
                        </div>

                        {{ $materials->links() }}


                        <table dir="auto" class="min-w-max w-full table-auto overflow-x-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">

                                <th class="py-3 px-2  text-right">المتبرع به

                                    </th>
                                    <th class="py-3 px-2  text-right">  المتبرع</th>

                                    <th class="py-3 px-2  text-right"> اضيف بواسطة</th>


                                <th class="py-3  text-center">العمليات</th>
                            </tr>
                            </thead>


                            <tbody   class="text-gray-600 dark:text-white text-sm font-light">


                            @foreach($materials as $d)
                            <tr  class="border-b relative border-gray-200 hover:bg-gray-100 dark:hover:bg-dark-bg dark:hover:text-white">
                                <td   class=" px-2  text-left" >
                                    <div class="flex flex-col items-start">

                                        <span class="font-bold text-xl">{{$d->name}}
                                            </span>

                                        <span class="  font-bold py-1 px-1  text-xs">
                                        {{ $d->note }}
                                        </span>
                                    </div>
                                     </td>


                                <td>
                                    <span class="font-bold">{{$d->donor->name}}
                                        </span>
                                </div>
                                <div>
                                    <span class=" mb-6 mt-4 text-blue-700 font-bold py-1 px-1  text-xs">
                                   {{ $d->donor->phone }}
                                    </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="flex items-center">
                                        <span class="font-bold">{{$d->user->name}}
                                            </span>
                                    </div>
                                    @if ($d->state==1)
                                     <span class="text-green-600 flex space-x-2 p-2">
                                        تم الاستلام من المحصل <x-heroicon-s-check class="h-4 w-4" />
                                        <br>
                                     </span>
                                     <span>
                                        <span>
                                            عن طريق الادمن :{{ $d->resave_by_user->name}}
                                        </span>
                                        <span class="text-gray-600 dark:text-gray-200 text-sm w-40 ">
                                            {{ $d->r_note }}
                                        </span>
                                     </span>

                                    @elseif ($d->state==0)
                                    <span class="text-warning p-2">
                                        لم يتم الاستلام بعد <span class="h-4 w-4 font-bold" >X</span>
                                        <br>
                                    </span>


                                    @endif

                                    <div>
                                        <span class=" mb-6 mt-4 text-green-600 font-bold py-1 px-1  text-xs">
                                    {{date('d/M/Y', strtotime($d->updated_at))}}
                                            </span></div>
                                </td>

                                <td class=" text-right">
                                    <div class="flex flex-col text-center item-center justify-between">

                                        @if ($d->state==0)

                                        <div class="  mr-2 mt-2 cursor-pointer transform hover:text-purple-500 hover:scale-110">

                                        <x-button variant="success" class="font-bold" @click="$wire.set('edite_don',{{ $d->id }}); show_resave_model=true;"
                                            >
                                          استلام التبرع
                                        </x-button>
                                        </div>
                                       @endif
                                            <div class="  mr-2 mt-2 cursor-pointer transform hover:text-purple-500 hover:scale-110">
                                                <x-button  variant="info" href="{{ route('materialdonation.show',['materialdonation'=>$d]) }}">
                                                    <x-heroicon-s-eye class=" h-4 w-4"/>
                                                <span>
                                                    عرض التفاصيل
                                                </span>
                                                </x-button>


                                            </div>




                                        </div>

                    @if($deleteDept!="no" && $d->id==$deleteDept)

                    <div x-data="{dpm{{$deleteDept}}: 1}">
                        <div  x-show="dpm{{$deleteDept}}" class="dialog">
                            <div class="dialog-content">
                                <div class="dialog-header dark:text-black">هل انت متاكد من الحذف
                                </div>
                                <div class="dialog-body lg:flex" dir="auto">
                                    <h1 class="text-xl text-red-800 font-bold p-4 rounded-lg ">
                                        سيتم حذف جميع منتجات هذا القسم وطلباته ؟
                                        هل انت متأكد من الحذف ؟؟!!
                                    </h1>
                                </div>
                                <div class="dialog-footer flex mx-auto">
                                    <button type="button" class="btn btn-light"
                                            wire:click="setDeleteDept('no')"
                                            @click="dpm{{$deleteDept}}=!dpm{{$deleteDept}}">Cancel</button>
                                    <button type="button" wire:click="DeleteDept({{$deleteDept}})"  class="btn hover:text-red-700 hover:border-red-700 bg-red-700 text-white">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                                </td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>



                    </div>
            </div>
        </div>
    </div>






    @if( session()->get('statt')=='ok')

        <div class="fixed p-4   bg-green-500 text-white top-10 w-32 mx-auto right-5 toast" role="alert" x-on:toast1.window="open = !open" x-data="{ open: true }" x-show.transition="open" x-cloak>
            <div class="flex items-center justify-between mb-1">
            <span class="font-bold text-blue-600">
        {{__(session()->get('title'))}}</span>
                <button class="btn btn-dark btn-xs" @click="open = false"><svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
            </div>
            {{__(session()->get('message'))}}
        </div>
    @endif

    <x-slot name="script">
    </x-slot>




</div>
