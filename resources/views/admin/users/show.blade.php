@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.users.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="striped bordered show-table">
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
                        {{ trans('cruds.user.fields.email_verified_at') }}
                    </th>
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.roles') }}
                    </th>
                    <td>
                        @foreach($user->roles as $key => $roles)
                            <span class="label label-info">{{ $roles->title }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.users.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection