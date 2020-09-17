@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}</h3>
    </div>

    <form method="POST" action="{{ route("admin.permissions.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="title" class="text-xs required">{{ trans('cruds.permission.fields.title') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="text" id="title" name="title" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('title') ? ' border-red-500' : '' }}" value="{{ old('title') }}" required>
                </div>
                @if($errors->has('title'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('title') }}</p>
                @endif
                <span class="block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection