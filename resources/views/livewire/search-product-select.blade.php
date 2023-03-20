<div x-data='{show:{{ $show_drop }} }' class="relative flex flex-col w-full  items-center">

{{--
    @if(!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="reset"></div>

        <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            @if(!empty($contacts))
                @foreach($contacts as $i => $contact)
                    <a
                        class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                    >{{ $contact['name'] }}</a>
                @endforeach
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif --}}





    {{ $product_id }}

    <input type="hidden" name="product_id" value="{{ $product_id }}">

    <div  @click.away="$wire.set('show_drop',0);" style="position:relative" class="w-full ">
        <input
        type="text"
        placeholder="Search Contacts..."
        wire:model="query"
        wire:click="togelshow"
        wire:keydown.escape="resetselect"
        wire:keydown.tab="resetselect"
        wire:keydown.arrow-up="decrementHighlight"
        wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectContact"
   class="form-control w-3/4 rounded-md p-4 dark:bg-primary-dark relative" />


   @if ($show_drop==1)

      <div  class="absolute flex flex-col  w-3/4 mx-auto rounded-md border" style=" z-index:100">
         @if(strlen($query)>1)


         @if(count($contacts)>0)
            <div class="list-group flex flex-col py-2 bg-gray-400 text-black">
              @foreach($contacts as $pro)

              <div @click="$wire.set('product_id',{{ $pro['id'] }}); $wire.set('show_drop',0); $wire.set('query','{{$pro['name']}}');  p_price={{$pro['price']}}" class="block px-4 py-2 text-sm leading-5 border rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:focus:text-white dark:focus:bg-dark-eval-3 dark:text-black dark:hover:text-black dark:hover:bg-dark-eval-3">
                {{$pro['price']}} : {{$pro['name']}}
            </div>
                @endforeach
        </div>
           @elseif($product_id==-1)
            <div class="block px-4 py-2 text-sm bg-white leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:focus:text-white dark:focus:bg-dark-eval-3 dark:text-black dark:hover:text-black dark:hover:bg-dark-eval-3">...لاتوجد نتائج مطابقة</div>
            @endif
         @endif
         <div wire:loading class="block px-4 bg-white py-2 text-sm leading-5 border rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out dark:focus:text-white dark:focus:bg-dark-eval-3 dark:text-black dark:hover:text-black dark:hover:bg-dark-eval-3">
            ...جاري البحث
        </div>

      </div>

   @endif


</div>


</div>
