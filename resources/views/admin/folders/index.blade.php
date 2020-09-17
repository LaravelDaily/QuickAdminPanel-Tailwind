@extends('layouts.admin')
@section('content')
@can('folder_create')
    <div class="block my-4">
        <a class="px-4 py-2 bg-green-600 text-white rounded-sm text-sm hover:bg-green-500 focus:outline-none" href="{{ route('admin.folders.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.folder.title_singular') }}
        </a>
    </div>
@endcan
<div class="max-w w-full shadow-md rounded-md overflow-hidden border bg-white">
    <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
        <h3 class="text-sm">{{ trans('cruds.folder.title_singular') }} {{ trans('global.list') }}</h3>
    </div>

    <div class="px-5 py-6 text-gray-700 bg-gray-200 border-b">
        <div class="w-full">
            <table class="stripe hover bordered datatable datatable-Folder">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.folder.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.folder.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.folder.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.folder.fields.folder') }}
                        </th>
                        <th>
                            {{ trans('cruds.folder.fields.files') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($folders as $key => $folder)
                        <tr data-entry-id="{{ $folder->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $folder->id ?? '' }}
                            </td>
                            <td>
                                {{ $folder->name ?? '' }}
                            </td>
                            <td>
                                {{ $folder->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $folder->folder->name ?? '' }}
                            </td>
                            <td>
                                @foreach($folder->files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('folder_show')
                                    <a class="inline-block px-2 py-1 bg-indigo-600 text-white rounded-sm text-xs hover:bg-indigo-500 focus:outline-none mr-1 mt-1" href="{{ route('admin.folders.show', $folder->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('folder_edit')
                                    <a class="inline-block px-2 py-1 bg-blue-600 text-white rounded-sm text-xs hover:bg-blue-500 focus:outline-none mr-1 mt-1" href="{{ route('admin.folders.edit', $folder->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('folder_delete')
                                    <form action="{{ route('admin.folders.destroy', $folder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="inline-block px-2 py-1 bg-red-600 text-white rounded-sm text-xs hover:bg-red-500 focus:outline-none mr-1 mt-1" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('folder_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.folders.massDestroy') }}",
    className: 'bg-red-600 text-white hover:bg-red-500',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Folder:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection