<x-dashe-layout>


    <div class="max-w-4xl flex flex-col mx-auto  bg-white border rounded-lg dark:bg-dark ">
        <div class="text-center p-8 bg-info shadow-sm rounded-md text-3xl text-darker dark:text-light">
            <h1>اضافة العروض</h1>
        </div>
        <hr>
        <form x-data="{p_price:0}"  dir="auto" method="POST" action="{{ route('offers.store') }}" class="mx-auto flex flex-col w-3/4  space-x-2 space-y-3  dark:bg-dark">

            @csrf
            <x-label :value="__('اختيار المنتج  ')" />
            <x-label :value="__('ادخل اسم المنتج او رقم التعريف الخاص فيه   ')" />
            <div>
                @livewire('search-product-select',)
            </div>



            <hr>
            <div x-show="p_price!=0" class="flex px-4" >
            <span>سعر المنتج:</span>
            <span class="font-bold text-red-600" x-text="p_price"></span>
        </div>
            <hr>
            <x-label :value="__('مقدار القيمة المراد تخفيضها' )"/>
            <input  type="number" name="p_dic" class="rounded-md p-2 text-dark dark:bg-darker dark:text-light
            @error('p_dic')
            border-danger
           @enderror  focus:border-info ">

            <x-label :value="__('تاريخ انتهاء العرض')"/>

            <input type="date" name="to_date" id=""/>
            @error('to_date')
            <span class="text-danger text-sm">{{ $message }}</span>

            @enderror
            <hr>
            <div class="text-center">
            <x-button variant="info" type="submit" >
                حفظ
            </x-button>
            </div>

        </form>

    </div>




</x-dashe-layout>
