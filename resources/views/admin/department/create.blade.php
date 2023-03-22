<x-dashe-layout>


    <div class="flex flex-col max-w-4xl mx-auto bg-white border rounded-lg dark:bg-dark-eval-2 ">
        <div class="p-4 text-2xl text-center text-darker dark:text-light">
            <h1>اضافة قسم  (الاقسام)</h1>
        </div>
        <hr>
        <form  dir="auto" method="POST" action="{{ route('depts.store') }}" class="flex flex-col w-3/4 mx-auto space-x-2 space-y-3 dark:bg-dark">

            @csrf
            <x-label :value="__('اسم القسم ')" />

            <div >
            <x-input name="name" required class=" p-2
            @error('name')
            border-danger
            @enderror border text-right " placeholder="اسم القسم" value="{{ old('name') }}"/>

            @error('name')
            <span class="text-sm text-danger">{{ $message }}</span>

            @enderror
            </div>
            <div>
                <label class="uppercase  md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('ملاحظات')}}</label>
                <textarea
                    name="note"
                    class="py-1 px-1 w-full rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" rows="3" >
          </textarea>
            </div>
            <hr>
            <x-label :value="__(' الصورة ')"/>
            <div id="imgurl">

            </div>

            @error('imgurl')
            <span class="text-sm text-danger">{{ $message }}</span>

            @enderror
            <div class="text-center">
            <x-button variant="success" type="submit" >
                حفظ
            </x-button>
            </div>

        </form>

    </div>

    <x-slot name="script">
        <script>

            var img=new ImagetoServer({
                url:"{{ route('uploade') }}",
                src:"{{ old('img') }}",
                id:'imgurl',
                h:1000,
                w:1000,
                with_w_h:true,
                shep:'rect',
            });



        </script>




    </x-slot>








</x-dashe-layout>
