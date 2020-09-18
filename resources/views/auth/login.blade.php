@extends('layouts.app')
@section('content')
<div class="auth-card">
    <div class="title">
        {{ trans('panel.site_title') }}
    </div>

    @if(session('message'))
        <div class="alert success">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label class="block">
            <span class="text-gray-700 text-sm">{{ trans('global.login_email') }}</span>
            <input type="email" name="email" class="form-input {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" autofocus required>
            @if($errors->has('email'))
                <p class="invalid-feedback">{{ $errors->first('email') }}</p>
            @endif
        </label>

        <label class="block mt-3">
            <span class="text-gray-700 text-sm">{{ trans('global.login_password') }}</span>
            <input type="password" name="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
            @if($errors->has('password'))
                <p class="invalid-feedback">{{ $errors->first('password') }}</p>
            @endif
        </label>

        <div class="flex justify-between items-center mt-4">
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox text-indigo-600">
                    <span class="mx-2 text-gray-600 text-sm">{{ trans('global.remember_me') }}</span>
                </label>
            </div>

            @if(Route::has('password.request'))
                <div>
                    <a class="link" href="{{ route('password.request') }}">{{ trans('global.forgot_password') }}</a>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="button">
                {{ trans('global.login') }}
            </button>
        </div>
    </form>
</div>
@endsection