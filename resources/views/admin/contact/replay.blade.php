
<x-dashe-layout>


    <div class="max-w-4xl mx-auto p-8">

        <div class="mx-auto bg-white p-8 rounded-md dark:bg-dark-eval-1 text-right flex flex-col">

            <div class="text-right">
            <div class=" flex flex-col">
                الرد على
                {{ $contact->name }}
               <span class="text-blue-700 font-bold"> {{ $contact->email }}</span>
               </div>
               <hr>
               <div class=" flex flex-col p-4 rounded-md w-full border">
                <h2  class="text-xl text-gray-600  font-bold dark:text-gray-300">{{ $contact->subject }}
                </h2>
                <b class="text-sm text-gray-600  font-bold dark:text-gray-300">{{ $contact->message }}</b>
               </div>
            </div>


            <br>

            <form method="POST" action="{{ route('admin.contacts.update',['contact'=>$contact]) }}">
                @csrf

                <div class="space-y-4">
                <textarea name="replay" class="text-right bg-white rounded-md dark:bg-dark-bg w-full" placeholder="اكتب الرد هنا"></textarea>
                </div>

                <button class="mx-auto mt-4 bg-success p-2 rounded-md">
                    ارسال الرد
                </button>

            </form>

        </div>

    </div>


</x-dashe-layout>

