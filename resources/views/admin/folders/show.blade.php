@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.show') }} {{ trans('cruds.folder.title') }}
    </div>

    <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.folders.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="striped bordered show-table">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.folder.fields.id') }}
                    </th>
                    <td>
                        {{ $folder->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.folder.fields.name') }}
                    </th>
                    <td>
                        {{ $folder->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.folder.fields.project') }}
                    </th>
                    <td>
                        {{ $folder->project->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.folder.fields.folder') }}
                    </th>
                    <td>
                        {{ $folder->folder->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.folder.fields.files') }}
                    </th>
                    <td>
                        @foreach($folder->files as $key => $media)
                            <a href="{{ $media->getUrl() }}" target="_blank">
                                {{ trans('global.view_file') }}
                            </a>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.folders.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection