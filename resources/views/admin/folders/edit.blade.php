@extends('layouts.admin')
@section('content')
<div class="max-w w-full bg-white shadow-md rounded-md overflow-hidden border">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('global.edit') }} {{ trans('cruds.folder.title_singular') }}</h3>
    </div>

    <form method="POST" action="{{ route("admin.folders.update", [$folder->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.folder.fields.name') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <input type="text" id="name" name="name" class="form-input w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('name') ? ' border-red-500' : '' }}" value="{{ old('name', $folder->name) }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="project" class="text-xs required">{{ trans('cruds.folder.fields.project') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <select class="form-input select2 w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('project') ? ' border-red-500' : '' }}" name="project_id" id="project" required>
                        @foreach($projects as $id => $project)
                            <option value="{{ $id }}" {{ ($folder->project ? $folder->project->id : old('project_id')) == $id ? 'selected' : '' }}>{{ $project }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('project'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('project') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.project_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="folder" class="text-xs">{{ trans('cruds.folder.fields.folder') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <select class="form-input select2 w-full px-3 py-2 appearance-none rounded-md focus:border-indigo-600{{ $errors->has('folder') ? ' border-red-500' : '' }}" name="folder_id" id="folder">
                        @foreach($folders as $id => $folderName)
                            <option value="{{ $id }}" {{ ($folder->folder ? $folder->folder->id : old('folder_id')) == $id ? 'selected' : '' }}>{{ $folderName }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('folder'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('folder') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.folder_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="files-dropzone" class="text-xs">{{ trans('cruds.folder.fields.files') }}</label>

                <div class="mt-2 relative rounded-md shadow-sm">
                    <div class="needsclick dropzone w-full{{ $errors->has('files') ? ' border-red-500' : '' }}" id="files-dropzone">
                    </div>
                </div>
                @if($errors->has('files'))
                    <p class="text-red-500 text-xs italic mt-2">{{ $errors->first('files') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.files_helper') }}</span>
            </div>
        </div>

        <div class="flex justify-end px-5 py-3">
            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">{{ trans('global.save') }}</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    var uploadedFilesMap = {}
Dropzone.options.filesDropzone = {
    url: '{{ route('admin.folders.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($folder) && $folder->files)
          var files =
            {!! json_encode($folder->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection