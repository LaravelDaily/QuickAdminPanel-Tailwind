@extends('layouts.app')
@section('content')
<div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
    <div class="flex justify-center items-center mb-4">
        <span class="text-gray-700 font-semibold text-2xl">{{ trans('panel.site_title') }}</span>
    </div>

    @if(session('status'))
        <div class="flex max-w w-full bg-green-300 shadow-md rounded-lg overflow-hidden mb-4 py-4 px-6 text-green-700 font-medium">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="block">
            <span class="text-gray-700 text-sm">{{ trans('global.login_email') }}</span>
            <input type="email" name="email" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600{{ $errors->has('email') ? ' border-red-500' : '' }}" value="{{ old('email') }}" autofocus required>
            @if($errors->has('email'))
                <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('email') }}</p>
            @endif
        </label>

        <div class="mt-6">
            <button type="submit" class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500">
                {{ trans('global.send_password') }}
            </button>
        </div>
    </form>
</div>
@endsection