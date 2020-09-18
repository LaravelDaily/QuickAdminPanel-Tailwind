@extends('layouts.admin')
@section('content')

<div class="main-card">
    <div class="header">
        {{ trans('global.create') }} {{ trans('cruds.folder.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.folders.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="body">
            <div class="mb-3">
                <label for="name" class="text-xs required">{{ trans('cruds.folder.fields.name') }}</label>

                <div class="form-group">
                    <input type="text" id="name" name="name" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" required>
                </div>
                @if($errors->has('name'))
                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.name_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="project" class="text-xs required">{{ trans('cruds.folder.fields.project') }}</label>

                <div class="form-group">
                    <select class="select2{{ $errors->has('project') ? ' is-invalid' : '' }}" name="project_id" id="project" required>
                        @foreach($projects as $id => $project)
                            <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $project }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('project'))
                    <p class="invalid-feedback">{{ $errors->first('project') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.project_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="folder" class="text-xs">{{ trans('cruds.folder.fields.folder') }}</label>

                <div class="form-group">
                    <select class="select2{{ $errors->has('folder') ? ' is-invalid' : '' }}" name="folder_id" id="folder">
                        @foreach($folders as $id => $folderName)
                            <option value="{{ $id }}" {{ old('folder_id') == $id ? 'selected' : '' }}>{{ $folderName }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('folder'))
                    <p class="invalid-feedback">{{ $errors->first('folder') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.folder_helper') }}</span>
            </div>
            <div class="mb-3">
                <label for="files-dropzone" class="text-xs">{{ trans('cruds.folder.fields.files') }}</label>

                <div class="form-group">
                    <div class="needsclick dropzone w-full{{ $errors->has('files') ? ' is-invalid' : '' }}" id="files-dropzone">
                    </div>
                </div>
                @if($errors->has('files'))
                    <p class="invalid-feedback">{{ $errors->first('files') }}</p>
                @endif
                <span class="block">{{ trans('cruds.folder.fields.files_helper') }}</span>
            </div>
        </div>

        <div class="footer">
            <button type="submit" class="submit-button">{{ trans('global.save') }}</button>
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