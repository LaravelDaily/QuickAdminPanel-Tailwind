@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.change_password') }}
    </div>

    <form method="POST" action="{{ route("profile.password.update") }}">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="email" class="text-xs">{{ trans('cruds.user.fields.email') }}</label>

                <div class="form-group">
                    <input type="email" id="email" name="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
                @if($errors->has('email'))
                    <p class="invalid-feedback">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="text-xs">{{ trans('cruds.user.fields.password') }}</label>

                <div class="form-group">
                    <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                </div>
                @if($errors->has('password'))
                    <p class="invalid-feedback">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="text-xs">Repeat New {{ trans('cruds.user.fields.password') }}</label>

                <div class="form-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection