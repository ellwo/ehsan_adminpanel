<x-dashe-layout>

    <div class=" overflow-x-auto  w-full flex items-center justify-center  font-sans ">
        <div class="w-full lg:w-5/6">
            <div class="rounded-t bg-white dark:bg-darker min-h-screen mb-0 px-4 py-3 border-0">

                <x-button href="{{ url()->previous() }}">عودة الى القائمة</x-button>


                <div class="text-center text-4xl font-bold mx-auto">
                    تفاصيل تبرع نقدي رقم : {{ $mon->id }}
                </div>


                <div class="m-6 p-6 shadow-sm rounded-md border dark:bg-dark">
                    <div dir="rtl" class="flex mx-auto rounded-sm border p-2 space-y-4 w-1/2 flex-col">


                        <div class="flex justify-start space-x-2">
                            <div class="w-1/4 h-full px-2 font-bold border-l-2 text-info">

                                <b class="mx-1">اسم المتبرع</b>

                            </div>
                            <div class="w-3/4 px-2">
                                {{ $mon->donor->name }}
                            </div>

                        </div>

                        <div class="flex justify-start space-x-2">
                            <div class="w-1/4 h-full px-2 font-bold border-l-2 text-info">

                                <b class="mx-1"> رقم هاتف المتبرع</b>

                            </div>
                            <div class="w-3/4 px-2">
                                {{ $mon->donor->phone }}
                            </div>

                        </div>



                        <div class="flex justify-start space-x-2">
                            <div class="w-1/4 h-full px-2 font-bold border-l-2 text-info">

                                <b class="mx-1"> المبلغ</b>

                            </div>
                            <div class="w-3/4 px-2">
                                <span>
                                    {{ $mon->amount }}
                                    <span class="text-green-800">
                                    {{ $mon->type==0?'ريال يمني':($mon->type==1?'ريال سعودي':'دولار') }}
                                    </span>
                                    </span>
                            </div>

                        </div>



                        <div class="flex justify-start space-x-2">
                            <div class="w-1/4 h-full px-2 font-bold border-l-2 text-info">

                                <b class="mx-1"> الملاحظات</b>

                            </div>
                            <div class="w-3/4 px-2">
                                    {{ $mon->note }}

                            </div>

                        </div>


                        <hr>
                        <div class="flex  flex-col space-x-4">
                            <b class="mx-4">معلومات المحصل</b>
                            <span>
                                {{ $mon->user->name }}
                                <span class="text-green-800">
                               {{ $mon->user->phone }}
                                </span>
                                </span>

                                <hr>
                                @if ($mon->state==1)
                                <span class="text-green-600 flex space-x-2 p-2">
                                   تم الاستلام من المحصل <x-heroicon-s-check class="h-4 w-4" />
                                   <br>
                                   <span class="text-gray-600 dark:text-gray-200 text-sm w-40 ">
                                       {{ $mon->r_note }}
                                   </span>
                                </span>

                               @elseif ($mon->state==0)
                               <span class="text-warning p-2">
                                   لم يتم الاستلام بعد <span class="h-4 w-4 font-bold" >X</span>
                                   <br>
                               </span>


                               @endif

                        </div>

                        <div class="flex  space-x-4">
                            <b class="mx-4">التاريخ</b>
                            {{ $mon->created_at }}
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
</x-dashe-layout>
