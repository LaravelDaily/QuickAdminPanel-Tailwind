@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}</h3>
    </div>

    <form method="POST" action="{{ route("admin.roles.update", [$role->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="title" class="text-xs required">{{ trans('cruds.role.fields.title') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="text" id="title" name="title" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('title') ? ' border-red-500' : '' }}" value="{{ old('title', $role->title) }}" required>
                </div>
                @if($errors->has('title'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('title') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="text-xs required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-input select2 w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('users') ? ' border-red-500' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('permissions') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection