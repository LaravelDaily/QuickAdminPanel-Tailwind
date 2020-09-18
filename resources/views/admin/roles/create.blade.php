@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="title" class="text-xs required">{{ trans('cruds.role.fields.title') }}</label>

                <div class="form-group">
                    <input type="text" id="title" name="title" class="{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                </div>
                @if($errors->has('title'))
                    <p class="invalid-feedback">{{ $errors->first('title') }}</p>
                @endif
                <span class="block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="mb-3">
                <label class="text-xs required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn-sm btn-indigo select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn-sm btn-indigo deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="select2{{ $errors->has('users') ? ' is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <p class="invalid-feedback">{{ $errors->first('permissions') }}</p>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection