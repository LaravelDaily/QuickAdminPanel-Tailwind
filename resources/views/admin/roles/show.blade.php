@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.show') }} {{ trans('cruds.role.title') }}</h3>
    </div>

    <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
        <div class="block pb-4">
            <a class="inline-block px-3 py-2 rounded-sm text-sm focus:outline-none mx-1 bg-gray-300 hover:bg-gray-400 text-black" href="{{ route('admin.roles.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="w-full table-auto striped bordered bg-white show-table">
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
            <a class="inline-block px-3 py-2 rounded-sm text-sm focus:outline-none mx-1 bg-gray-300 hover:bg-gray-400 text-black" href="{{ route('admin.roles.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection