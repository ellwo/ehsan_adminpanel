<x-dashe-layout>


    <div class="w-full ">

        <div class="w-full ">

            <div class="m-4 text-3xl font-bold text-right">
                الاعدادات
            </div>

            <div class="w-full px-6 py-4 mx-auto my-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker">
                <form action="{{route('sitesetting.post')}}" method="POST">

                    @csrf
                    <div class="space-y-2 text-right">
                    <x-label class="text-right" for="site_name" :value="__('اسم الموقع')" />
                    <x-input dir="auto" id="site_name" value="{{Config::get('mysetting.site_name')}}" class="block w-full" type="text" name="site_name"
                                  placeholder=""  />

                </div>

                <div class="mt-4 space-y-2 ">
                    <x-label class="" for="facebook_link" :value="__('Facebook Link')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-bi-facebook aria-hidden="true" class="w-5 h-5 text-blue-700" />
                        </x-slot>


                        <x-input id="facebool_link" withicon value="{{Config::get('mysetting.facebook_link')}}" class="block w-full" type="text"
                         name="facebook_link"
                                  placeholder=""  />
                    </x-input-with-icon-wrapper>

                </div>
                <div class="grid grid-cols-2 gap-4">

                <div dir="" class="mt-4 text-right space-y-2 ">
                    <x-label class="" for="facebook_link" :value="__('عنوان الفرع الرئيسي')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-bi-map aria-hidden="true" class="w-5 h-5 text-blue-700" />
                        </x-slot>


                        <x-input dir="rtl" id="facebool_link" withicon value="{{Config::get('mysetting.address')}}" class="block w-full" type="text"
                         name="address"
                                  placeholder=""  />
                    </x-input-with-icon-wrapper>

                </div>

                <div dir="" class="mt-4 text-right space-y-2 ">
                    <x-label class="" for="facebook_link" :value="__('عنوان الفرع الرئيسي')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-bi-map aria-hidden="true" class="w-5 h-5 text-blue-700" />
                        </x-slot>


                        <x-input dir="rtl" id="facebool_link" withicon value="{{Config::get('mysetting.address')}}" class="block w-full" type="text"
                         name="address"
                                  placeholder=""  />
                    </x-input-with-icon-wrapper>

                </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                <div class="mt-4 space-y-2">
                    <x-label for="email_link" :value="__('Email')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5 text-yellwo-700" />
                        </x-slot>
                        <x-input withicon id="email_link" class="block w-full" type="email"
                        name="email_link"
                                 value="{{config('mysetting.email_link')}}"
                                  placeholder="{{ __('Email@me.com') }}" />
                    </x-input-with-icon-wrapper>
                </div>
                <div class="mt-4 space-y-2">
                    <x-label for="phone_no" :value="__('Phone Number')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-bi-phone aria-hidden="true" class="w-5 h-5 text-blue-700" />
                        </x-slot>
                        <x-input withicon id="phone_no" class="block w-full" type="text"
                        name="phone_no"
                                 value="{{config('mysetting.phone_no')}}"
                                  placeholder="{{ __('775212843') }}" />
                    </x-input-with-icon-wrapper>
                </div>



            </div>
{{--
                <div class="mt-4 space-y-2">
                    <x-label for="wahtsapp_no" :value="__('WhatsApp Number')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-bi-whatsapp aria-hidden="true" class="w-5 h-5 text-green-600" />
                        </x-slot>
                        <x-input withicon id="whatsapp_no" class="block w-full" type="text"
                        name="whatsapp_no"
                                 value="{{config('mysetting.email_link')}}"
                                  placeholder="{{ __('775212843') }}" />
                    </x-input-with-icon-wrapper>
                </div> --}}


                <div class="mt-4 space-y-2" dir="auto">
                    <x-label class="text-2xl" for="note" :value="__('(النبذة)من نحن ')" />
                    <textarea class="w-full rounded-md input-primary dark:bg-dark" rows="5" id="note" placeholder="{{__('من نحن ')}}" name="note" >{{config("mysetting.note")}}</textarea>
                </div>

                <hr/>


                <div class="grid grid-cols-2 gap-4">
                <div class="mt-4 space-y-2">
                    <x-label for="logo" :value="__('Logo شعار الموقع')" />

                    <style>
                        canvas{
                            max-width: 100% !important;
                        }
                    </style>
                    <div id="logo">

                    </div>
                </div>

                <div class="mt-4 space-y-2">
                    <x-label for="site_header_logo" :value="__('صورة الشعار المصغر (العلامة)')" />
                    <div id="site_header_logo">

                    </div>
                </div>

            </div>

                <hr/>
                {{-- <div class="mt-4 space-y-2 text-center">
                    <x-label for="site_hero_image" :value="__('(1400*800)  صورة العرض الاساسية')" />
                    <div id="site_hero_image">

                    </div>
                </div> --}}

                <div class="mt-4 space-y-2">
                    <x-button type="submit" class="justify-center w-full gap-2">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('حفظ التعديلات') }}</span>
                    </x-button> </div>


            </form>


            </div>



        </div>

    </div>
    <x-slot name="script">

        <script>
        //alert("sk");
     //   newimage=new ImagetoServer("/admin/uploade","logo","{{config('mysetting.logo')}}","rect",false);
        newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"logo",
                    w:100,
                    h:100,
                    hv:100,
                    shep:'rect',
                    with_w_h:true,
                     src:"{{ config('mysetting.logo') }}"
        });
        // her=new ImagetoServer(
        //         {
        //             url:"{{route('uploade')}}",
        //             id:"site_hero_image",
        //             w:1200,
        //             h:800,
        //             hv:600,
        //             shep:'rect',
        //             mx_h:500,
        //             mx_w:1400,
        //              src:"{{ config('mysetting.site_hero_image') }}"
        // });
        hh=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"site_header_logo",
                    w:100,
                    h:100,
                    with_w_h:true,
                     src:"{{ config('mysetting.site_header_logo') }}"
        });
    //     heroimage=new ImagetoServer("/admin/uploade","site_hero_image","{{config('mysetting.site_hero_image')}}","rect",false);
    //     heroimage=new ImagetoServer("/admin/uploade","site_header_logo","{{config('mysetting.site_header_logo')}}","rect",false);
    //    // imagewh=new ImagetoServer("/admin/uploade","imagewh","no",false,250,250,"#000")
        // img=new ImgaeUplodedtoServer({
        //     id:"imagewh",
        //     lablename:' <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
        //     oldsrc:"{{config('mysetting.site_hero_image')}}"

        // })
        // img.create();


        </script>

    </x-slot>

</x-dashe-layout>
