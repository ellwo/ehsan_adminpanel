@extends('layouts.admin')
@section('content')
{{--
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" disabled id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" >
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" disabled id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" >
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

        </form>


    </div>
</div> --}}

<div class="card" dir="rtl">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
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
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.role.title') }}
                        </th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                            <span class="mx-2 label label-info label-many">{{ $role."  | " }}</span>
                        @endforeach


                        </td>
                    </tr>
                </tbody>
            </table>


            @if (!$user->isBanned())

            <form dir="rtl" class="flex text-center col-md-4" align="center" action="{{ route("admin.users.ban.post", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div align='right' class="p-4 form-group" dir="rtl">
                    <label>حظر حتى</label>
                    <input type="date" class="form-control" name="expired_at" id=""/>
                    <label>ملاحظة الحظر </label>
                    <textarea  class="form-control" name="comment"></textarea>

                    <br>
                    <input type="submit" align='center' class="btn btn-danger" value="حظر">

                </div>

            </form>
            @else


            @endif

            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
