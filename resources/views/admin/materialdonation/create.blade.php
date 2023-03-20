<x-dashe-layout>


    <div class="max-w-4xl flex flex-col mx-auto  bg-white border rounded-lg dark:bg-dark ">
        <div class="text-center p-8 bg-info shadow-sm rounded-md text-3xl text-darker dark:text-light">
            <h1>اضافة العمولات</h1>
        </div>
        <div>
            <x-button variant="info" href="{{ route('discount') }}">
                عودة
            </x-button>
        </div>
        <hr>
        <form  dir="auto" method="POST" action="{{ route('discount.store') }}" class="mx-auto flex flex-col w-3/4  space-x-2 space-y-3  dark:bg-dark">

            @csrf
            <x-label :value="__('اختيار الامتياز  ')" />
            <div>

                <select name="role_id" id="role_id"  class="border rounded-md w-1/2 bg-white dark:bg-darker text-black dark:text-white">

            @foreach ($roles as $role )
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
            </select>

            </div>




            <hr>
            <x-label :value="__('نسبة العمولة بالمية %' )"/>
            <input  type="text" name="dis_persint" class="rounded-md p-2 text-dark dark:bg-darker dark:text-light
            @error('dis_persint')
            border-danger
           @enderror  focus:border-info ">
            <hr>
            <div class="text-center">
            <x-button variant="info" type="submit" >
                حفظ
            </x-button>
            </div>

        </form>

    </div>




</x-dashe-layout>
