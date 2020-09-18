@extends('layouts.admin')
@section('content')
<div class="main-card">
    <div class="header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="body">
        <div class="block pb-4">
            <a class="btn-md btn-gray" href="{{ route('admin.projects.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="striped bordered show-table">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.id') }}
                    </th>
                    <td>
                        {{ $project->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.name') }}
                    </th>
                    <td>
                        {{ $project->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.project.fields.users') }}
                    </th>
                    <td>
                        @foreach($project->users as $key => $users)
                            <span class="label label-info">{{ $users->name }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="block pt-4">
            <a class="btn-md btn-gray" href="{{ route('admin.projects.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection