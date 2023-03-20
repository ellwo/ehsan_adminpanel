@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table dir="rtl" class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr> <tr>
                        <th>
                            رقم الهاتف
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الامتياز
                        </th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                                <span class="label label-info label-many">{{ $role }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            عدد التبرعات النقدية المحصلة


                        </th>
                        <td class="flex flex-col">
                        {{ $user->monetarydonations->count()}}
                        <br>
                        <a style="margin-top:20px;" class="btn bg-white border btn-default" href="{{route('monetarydonation',['user_id'=>$user->id,'column_name'=>'user_id'])}}">
                            عرض                            </a>
                        </td>
                    </tr>
                     <tr>
                        <th>
                            عدد التبرعات العينية المحصلة
                        </th>
                        <td class="flex flex-col">
                        {{ $user->materialdonations->count()}}
                        <br>
                        <a style="margin-top:20px;" class="btn bg-white border btn-default" href="{{route('materialdonation',['user_id'=>$user->id,'column_name'=>'user_id'])}}">
                            عرض                            </a>

                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" 
            href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
