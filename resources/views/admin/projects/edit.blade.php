@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}</h3>
    </div>

    <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.project.fields.name') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="text" id="name" name="name" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('name') ? ' border-red-500' : '' }}" value="{{ old('name', $project->name) }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.project.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="users" class="text-xs">{{ trans('cruds.project.fields.users') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-input select2 w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('users') ? ' border-red-500' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $project->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('users') }}</p>
                @endif
                <span class="block">{{ trans('cruds.project.fields.users_helper') }}</span>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection