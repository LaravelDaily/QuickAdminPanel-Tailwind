@extends('layouts.app')
@section('content')
<div class="auth-card">
    <div class="title">
        {{ trans('panel.site_title') }}
    </div>

    @if(session('status'))
        <div class="alert success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="block">
            <span class="text-gray-700 text-sm">{{ trans('global.login_email') }}</span>
            <input type="email" name="email" class="form-input mt-1 block w-full rounded-md focus:border-indigo-600{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" autofocus required>
            @if($errors->has('email'))
                <p class="invalid-feedback">{{ $errors->first('email') }}</p>
            @endif
        </label>

        <div class="mt-6">
            <button type="submit" class="button">
                {{ trans('global.send_password') }}
            </button>
        </div>
    </form>
</div>
@endsection