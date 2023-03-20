@extends('layouts.admin')
@section('content')
@can('users_manage')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div  class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
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
                            اسم المستخدم
                        </th>
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
