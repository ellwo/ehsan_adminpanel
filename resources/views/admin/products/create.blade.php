<x-dashe-layout>
<div x-data="{step:1}"   class="items-center p-4 mx-auto ">

    <form action="{{ route('products.store') }}" method="POST" class="bg-white rounded-lg dark:bg-darker" >

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        @csrf
        <div dir="rtl" >

    <div class="p-6 overflow-hidden text-2xl mb-4  bg-blue-300 rounded-md shadow-md dark:bg-dark-eval-1">
        اضافة منتج جديد
    </div>


            <div class="" x-show='step==0'>
            </div>

            <div  class="space-y-4 text-center " x-show='step==1'>
                {{-- @livewire('admin.dept-part-mulit-select', ['type'=>1, 'selected'=>old('department_id')??[]  , 'dept'=> old('department_id','any')], key(time())) --}}

                <div class="relative flex-col justify-between space-x-4 space-y-2 ">

                    <x-label for="department_id" :value="__('اختر القسم ')" />

                    <select  wire:model='dept' name="department_id" class="sm:pl-5 sm:pr-10 mx-2 w-4/5 sm:mx-0 dark:bg-darker dark:text-white text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none">

                       @foreach( $depts as $ca)
                       <option  value="{{$ca->id}}">{{$ca->name}}</option>
                       @endforeach
                    </select>
                  </div>
        </div>

        <div>


            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الحالة</label>

        <label>
            مطلوب ال ID فقط
        <input  type="radio" name="required_ep" id="status"  checked value="0" />
    </label>
    <br>
    <label>
        مطلوب ال الايميل وكلمة السر
        <input type="radio" name="required_ep" id="status"  value="1" />
    </label>
        </div>


            <div  class="" wire:ignore x-show="step==1">
                <div class="grid gap-6 p-4 mb-6 lg:grid-cols-3">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم المنتج</label>
                        <input type="text"  value="{{ old('name') }}" name="name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <label for="modal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم الموديل</label>
                        <input type="text"  value="{{ old('modal') }}" name="modal" id="modal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">السعر</label>
                        <input type="number" name="price" value="{{ old('price') }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                    </div>
                    <div class="flex justify-between space-x-2">

                    </div>



                </div>

                <div class="lg:flex ">




                    <div class="p-8 lg:w-1/3 text-center border rounded-md ">
                        <div  wire:ignore>
                            <x-label :value="__('صورة العرض الاساسية')" />

                        <div id="img">


                        </div>
                        </div>


                    </div>




                    <div wire:ignore class="px-2 lg:w-2/3 text-center">
                        <x-label :value="__('صور اضافية للمنتج')" />

                        <div id="imgs">

                        </div>
                        </div>
                </div>


                <div class="md:flex">

                <div class="px-2 md:w-1/2 space-y-2">
                    <x-label :value="__('وصف مختصر للمنتج')" />
                    <textarea cols="30" rows="10"
                    name="note" id="note" maxlength="191"
                     class="w-full px-2 py-1 mr-2 text-black text-opacity-50 rounded shadow appearance-none ckeditor dark:bg-primary-darker dark:text-light focus:outline-none focus:shadow-outline focus:border-primary" >
                    @php
                     echo old('note');
                    @endphp
                     </textarea>
                </div>


                        <div x-data='{note_count:2}' class="flex flex-col md:w-1/2  space-x-4 space-y-2">

                            <x-label :value="__('تفاصيل المنتج ')" />

                            <template x-for="i in note_count" >
                                <div class="flex space-x-2">
                                <div class="w-1/4" ><input type="text"  name="n_key[]" id="" class="w-full p-2 font-bold rounded-md dark:text-light dark:bg-darker" ></div>
                                <div class="w-3/4"><input type="text" name="n_value[]" id="" class="w-full p-2 rounded-md dark:text-light dark:bg-darker"></div>
                                </div>


                            </template>


                            <div class="text-center">
                            <x-button variant="info" @click="note_count++" class="mx-auto" type="button">
                        اضافة تفاصيل اخرى
                                <x-heroicon-o-plus class="w-4"/>
                            </x-button>
                            </div>




                        </div>





            </div>

                        <div class="m-5 mx-auto text-center">
                            <x-button variant="success" @click="note_count++" class="mx-auto" >
                                حفظ
                                 <x-heroicon-o-plus class="w-4"/>
                             </x-button>


                        </div>





    <x-slot name="script">
        <script type="text/javascript">
             newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"img",
                    w:1000,
                    h:1000,
                    color:'#FFFFFF',
                   // withmask:true,
                    with_w_h:true,
                    //maskUrl:'{{ config("mysetting.logo") }}',

                    src:"{{ old('img') }}"
        });
          newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"imgs",
                    w:1000,
                    //mx_w:1000,
                    h:1000,
                    with_w_h:true,
                   // withmask:true,
                    // maskUrl:'{{ config("mysetting.logo") }}',
                      src:"@JSON(old('imgs'))",

                     multi:true
        });

        ClassicEditor
    .create( document.querySelector( '#note' ), {
        language: {
            // The UI will be English.
            ui: 'ar',

            // But the content will be edited in Arabic.
            content: 'ar'
        }  ,
         removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],

    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );


        </script>

    </x-slot>
            </div>

{{--
            <div  class="flex justify-between w-1/2 mx-auto mt-4 ">

                <x-button x-show="step<2" type="button" class="block" variant="success" @click="step=step+1; $wire.set('step',{{ $step+1 }})" >التالي </x-button>

                @if($step > 0 )

                <x-button  type="button" @click="step=step-1; $wire.set('step',{{ $step-1 }})" variant="info" >السابق </x-button>

                @endif

            </div> --}}
        </div>




    </form>


</div>
</x-admin-layout>
