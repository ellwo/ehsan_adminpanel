<div>

    <div class="max-w-5xl mx-auto rounded-md p-8 bg-white dark:bg-dark-eval-2">
        <h1 class="text-right text-xl font-bold">
            ادارة الرسائل الواردة
        </h1>

    <div class="block w-full overflow-x-auto">
        <!-- Projects table -->
        <table dir="rtl" class="items-center w-full bg-transparent border-collapse">
            <thead>
                <tr>
                    <th  class="px-6 text-right bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold ">
                        المرسل
                    </th>
                    <th  class="px-6 font-bold bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap  text-center">
                        الرسالة
                    </th>
                    <th class="px-6  bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                 التاريخ
                    </th>
                    <th class="px-6  bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                        الحالة
                    </th>
                    <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center">
                        عمليات
                    </th>
                </tr>
                </thead>
                <tbody>


                    @foreach ($contacts as $co)

                    <tr class="border border-b-2 border-blue-900">

                    <td class="border-t-0  align-top border-l-2 border-r-0 text-xs whitespace-nowrap p-1">

                        <div class="rounded-t mb-0   border-0">
                            <div class="flex  flex-wrap items-center ">
                                    <div class="flex flex-col  w-48     px-4 ">
                                        <b>اسم المرسل</b> {{ $co->name }}
                                        <b>عنوان بريد المرسل</b> {{ $co->email }}
                                        <b>رقم هاتف المرسل</b> {{ $co->phone }}

                                    </div>
                            </div>
                        </div>
                    </td>

                    <td   class="border-t-0  align-top border-l-2 border-r-0 text-xs  p-1">
                       <div class="md:text-xl font-bold justify-center items-center flex flex-col">
                        {{ $co->subject }}
                       </div>
                       <hr>
                       <div class="h-14 ">
                       <x-perfect-scrollbar as="nav" aria-label="main" class=" p-2 hidden sm:flex flex-col flex-1 gap-4 px-3">
                       {{ $co->message }}
                       </x-perfect-scrollbar>
                       </div>
                        </td>
                        <td   class="border-t-0  align-middle border-l-2 border-r-0 text-xs p-1">
                            <span class="mx-auto my-auto rounded-md p-2 text-white bg-success">{{ $co->created_at }}</span>
                            </td>
                            <td   class="border-t-0  align-middle border-l-2 border-r-0 text-xs whitespace-nowrap p-1">
                                @php
                              echo   $co->reply!=null?"<span class='text-white p-2 bg-blue-600 rounded-box border'> تم الرد في ".$co->updated_at."</span>":"<span class='text-white p-2 bg-danger rounded-box border'>لم يتم الرد</span>" ;
@endphp
                            </td>
                                <td  class="border-t-0   align-baseline border-l border-r-0 text-xs whitespace-nowrap p-1">
                                    <div class="flex items-center ">
                                        <x-button href="{{ route('admin.contacts.replay',['contact'=>$co]) }}" class="mx-4">
                                           عرض ورد
                                        </x-button>
                                    </div>
                                </td>




                    </tr>
                   @endforeach
                </tbody>
        </table>
        {{ $contacts->links() }}
    </div>

</div>
</div>
