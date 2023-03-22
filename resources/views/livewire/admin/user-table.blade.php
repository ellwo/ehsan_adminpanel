<div  class="card">


    <div class="w-full top-0 right-0 bottom-0 z-30 bg-white bg-opacity-50 fixed" wire:loading

    wire:target="gotoPage,nextPage,perviousPage">
    <x-loading/>
  <div class="w-full h-4 bg-blue-900 mt-16 rounded animate-pulse top-10 bottom-0 my-auto"></div>
</div>
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">


            <div class="w-1/2 mx-auto p-4">

            <x-input-with-icon-wrapper>
                <x-slot name="icon" role="button">
                    <x-bi-search aria-hidden="true" class="w-5 h-5" />
                </x-slot>
                <x-input dir="auto" wire:model="search" name="search" withicon id="search"
                    class="block mx-2 rounded-full w-full" type="text" :value="old('name')" required autofocus
                    placeholder="{{ __('ابحث برقم الهاتف او اسم المستخدم') }}" />
            </x-input-with-icon-wrapper>

        </div>
            <br>
            <br>


            {{ $users->links() }}
            <table dir="auto" class="table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            رقم الهاتف
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            Username                       </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            الحظر والتبنيد
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->phone ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.users.show',$user) }}">{{ $user->username ?? '' }}</a>
                            </td>
                            <td>
                                @foreach($user->roles->pluck('name') as $role)
                                    <span class="badge badge-info">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td align='right' dir="rtl">

                                @if(!$user->isBanned())
                                <a class=" btn btn-danger btn-block" href="{{ route('admin.users.ban.show', $user) }}">
                                    حظر
                                    <x-heroicon-o-ban style="width: 20px;"/>
                                </a>
                                @else
                                <div class="m-1">
                                  <span class="p-1 m-2 border bg-danger">محظور
                                  لمدة{{now()->diffInDays( $user->bans->pluck('expired_at')->first()) }}
                                  يوم
                               </span> </div>
                                <div>
                                    <form action="{{ route('admin.users.ban.post', ['user'=>$user,'type'=>'unban']) }}" method="post">
                                        @csrf
                                        <input class="btn btn-success" type="submit" value="الغاء الحظر">
                                    </form>

                                </div>

                                @endif




                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ trans('global.view') }}
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
