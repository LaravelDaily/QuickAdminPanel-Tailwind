@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.permissions.update", [$permission->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="title" class="text-xs required">{{ trans('cruds.permission.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="title" name="title" class="{{ $errors->has('title') ? ' ' : '' }}" value="{{ old('title', $permission->title) }}" required>
                </div>
                @if($errors->has('title'))
                    <p class="invalid-feedback">{{ $errors->first('title') }}</p>
                @endif
                <span class="block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection