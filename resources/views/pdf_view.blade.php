<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    *{
        font-family: 'Amiri', serif;
    }
</style>
</head>
<body>

<div class="bg-white text-right overflow-x-auto relative  dark:text-white w-full shadow-md rounded my-6">

    <div class="w-full top-0 bottom-0 z-30 bg-white bg-opacity-50 absolute" wire:loading
         wire:target="changeDept,changePro,subsearch,gotoPage,nextPage,perviousPage,setDept_id" >
        <div class="w-full h-4 bg-blue-900 mt-16 rounded animate-pulse top-10 bottom-0 my-auto"></div>
    </div>


    <table dir="auto" class="table table-bordered table-striped table-hover  datatable datatable-donors">
        <thead>
        <tr >


    <th width="10">

    </th>

            <th>رقم المتبرع

            </th>

            <th >اسم المتبرع

                </th>
                <th > رقم الهاتف</th>
                <th > تاريخ الاضافة</th>

                <th > اضيف بواسطة</th>


        </tr>
        </thead>


        <tbody   class="">


        @foreach($donors as $d)
        <tr data-entry-id="{{ $d->id }}" class="  ">

            <td>

            </td>
            <td >                                    @php

                echo $d->id;

                @endphp
</td>

            <td>
                @php

                echo $d->name;

                @endphp
            </td>
            <td >
             {{$d->phone}}

                    </td>
                    <td>

                {{date('d/M/Y', strtotime($d->updated_at))}}
                    </td>
                    <td >{{$d->user->name}}

                        <br>
                        {{$d->user->email}}
                            </td>

        </tr>
        @endforeach

        </tbody>
    </table>





</div>

</body>
</html>
