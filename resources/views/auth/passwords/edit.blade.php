@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.change_password') }}</h3>
    </div>

    <form method="POST" action="{{ route("profile.password.update") }}">
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="email" class="text-xs">{{ trans('cruds.user.fields.email') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="email" id="email" name="email" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('email') ? ' border-red-500' : '' }}" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
                @if($errors->has('email'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="text-xs">{{ trans('cruds.user.fields.password') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="password" id="password" name="password" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('password') ? ' border-red-500' : '' }}" required>
                </div>
                @if($errors->has('password'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="text-xs">Repeat New {{ trans('cruds.user.fields.password') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600" required>
                </div>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection