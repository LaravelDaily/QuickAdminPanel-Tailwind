@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.show') }} {{ trans('cruds.role.title') }}
    </div>

    <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.roles.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="striped bordered show-table">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.id') }}
                    </th>
                    <td>
                        {{ $role->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.title') }}
                    </th>
                    <td>
                        {{ $role->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.role.fields.permissions') }}
                    </th>
                    <td>
                        @foreach($role->permissions as $key => $permissions)
                            <span class="label label-info">{{ $permissions->title }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.roles.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection