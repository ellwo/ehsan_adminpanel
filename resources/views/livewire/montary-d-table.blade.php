
<div class="overflow-x-auto"
 {{-- x-data="{showform:{{$showform}}}" --}}
 >






    <div class=" overflow-x-auto bg-transparent w-full flex items-center justify-center  font-sans ">
        <div class="w-full lg:w-5/6">
            <div class="rounded-t bg-white dark:bg-darker mb-0 px-4 py-3 border-0">

                <div class="flex flex-wrap items-center">



                    {{-- <x-button variant="info" class="mx-auto" href="{{ route('depts.create') }}">
                        اضافة قسم جديد
                        <x-heroicon-s-plus class="h-8 w-8"/>
                    </x-button> --}}

                    {{-- <x-button variant="info" class="mx-auto" href="{{ route('donor.pdf') }}">
                        تنزيل PDF
                        <x-heroicon-s-plus class="h-8 w-8"/>
                    </x-button> --}}



                </div>
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full sm:px-4 max-w-full flex-grow sm:flex-1">
                        <h3 class="font-semibold relative mb-4 flex text-base text-blueGray-700">
                            {{__('المتبرعين')}}
                            <x-bi-grid class="w-10 h-10 text-yellow-400 flex"/>

                        </h3>
                        {{-- <div class="flex mt-4 dark:text-white flex-col ">


                            {{$donors->links()}}
                        </div> --}}


                    </div>



{{--

                    <div class="flex mt-4 dark:text-white flex-col ">


                        {{$donors->links()}}
                    </div> --}}

                    <div>
                        <div class="flex transition-shadow shadow">
                            <div class="relative flex flex-col items-center space-y-2 ">
                                <x-label value="عرض التبرعات النقدية حسب المحصل : "  />


                            <div x-data="{ dropdownOpen: false }" class="relative">

                                <x-button @click="dropdownOpen = !dropdownOpen" variant="secondary"   ><x-heroicon-o-menu class="w-5 h-5"/> </x-button>

                                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

                                <div x-show="dropdownOpen" class="absolute right-0 z-20 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                                    <a @click="$wire.set('user_id',-1)"
                                        class="w-full flex flex-col px-4 @if ($user_id==-1)
                                            bg-info
                                        @endif py-2 text-sm text-gray-800 border-b hover:bg-gray-200"
                                        >
                            جميع المحصلين
                                    </a>

                                    @foreach ($users as $buss)
                                    <a

                                    @if ($user_id!=$buss->id)
                                    @click="$wire.set('user_id',{{ $buss->id }})"
                                    @endif
                                        class="w-full flex flex-col px-4
                                        @if ($user_id==$buss->id)
                                            bg-info
                                        @endif py-2 text-sm text-gray-800 border-b hover:bg-gray-200" value="{{ $buss->id }}"
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
                    </div>


                    <div class="bg-white text-right overflow-x-auto relative  dark:text-white w-full shadow-md rounded my-6">

                        <div class="w-full top-0 bottom-0 z-30 bg-white bg-opacity-50 absolute" wire:loading
                              >
                            <div class="w-full h-4 bg-blue-900 mt-16 rounded animate-pulse top-10 bottom-0 my-auto"></div>
                        </div>


                        {{ $montries->links() }}

                        <table dir="auto" class="min-w-max w-full table-auto overflow-x-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm ">

                                <th class="py-3 px-2  text-right">المبلغ

                                    </th>
                                    <th class="py-3 px-2  text-right">  المتبرع</th>

                                    <th class="py-3 px-2  text-right"> اضيف بواسطة</th>


                                <th class="py-3  text-center">العمليات</th>
                            </tr>
                            </thead>


                            <tbody   class="text-gray-600 dark:text-white text-sm font-light">


                            @foreach($montries as $d)
                            <tr  class="border-b relative border-gray-200 hover:bg-gray-100 dark:hover:bg-dark-bg dark:hover:text-white">
                                <td   class="py-3 px-2 mb-4 text-left" >
                                    <div class="flex items-center">
                                        <div class="mr-2">

                                        </div>
                                        <span class="font-bold">{{$d->amount}}
                                            </span>
                                    </div>
                                    <div>
                                        <span class=" mb-6 mt-4 text-green-600 font-bold py-1 px-1  text-xs">
                                         {{ $d->type==0?'ريال يمني':$d->type==1?'ريال سعودي':'دولار' }}
                                        </span>
                                        </div>
                                        </td>


                                <td>
                                    <div class="mr-2">

                                    </div>
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
                                        <div class="mr-2">

                                        </div>
                                        <span class="font-bold">{{$d->user->name}}
                                            </span>
                                    </div>
                                    <div>
                                        <span class=" mb-6 mt-4 text-green-600 font-bold py-1 px-1  text-xs">
                                    {{date('d/M/Y', strtotime($d->updated_at))}}
                                            </span></div>
                                </td>

                                <td class="py-3   text-right">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4  mr-2 mt-2 cursor-pointer transform hover:text-purple-500 hover:scale-110">
                                            <a target="_blank" class="" href="{{url('product/'.$d->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>


                                        </div>
                                        <a href="{{ route('depts.edit',['dept'=>$d]) }}"  class="w-4 mr-2 mt-2 cursor-pointer transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <a wire:click="setDeleteDept({{$d->id}})" class="w-4 mr-2 mt-2 cursor-pointer transform hover:text-red-800 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
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
