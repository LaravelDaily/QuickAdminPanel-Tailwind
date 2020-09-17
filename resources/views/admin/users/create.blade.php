@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</h3>
    </div>

    <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.user.fields.name') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="text" id="name" name="name" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('name') ? ' border-red-500' : '' }}" value="{{ old('name') }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="email" class="text-xs required">{{ trans('cruds.user.fields.email') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="email" id="email" name="email" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('email') ? ' border-red-500' : '' }}" value="{{ old('email') }}" required>
                </div>
                @if($errors->has('email'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('email') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="password" class="text-xs required">{{ trans('cruds.user.fields.password') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="password" id="password" name="password" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('password') ? ' border-red-500' : '' }}" value="{{ old('password') }}">
                </div>
                @if($errors->has('password'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('password') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="roles" class="text-xs required">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1 cursor-pointer deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-input select2 w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('roles') ? ' border-red-500' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('roles') }}</p>
                @endif
                <span class="block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection