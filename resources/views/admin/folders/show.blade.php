@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.show') }} {{ trans('cruds.folder.title') }}</h3>
    </div>

    <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
        <div class="block pb-4">
            <a class="inline-block px-3 py-2 rounded-sm text-sm focus:outline-none mx-1 bg-gray-300 hover:bg-gray-400 text-black" href="{{ route('admin.folders.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="w-full table-auto striped bordered bg-white show-table">
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
            <a class="inline-block px-3 py-2 rounded-sm text-sm focus:outline-none mx-1 bg-gray-300 hover:bg-gray-400 text-black" href="{{ route('admin.folders.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection