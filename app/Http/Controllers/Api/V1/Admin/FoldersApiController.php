<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Folder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Http\Resources\Admin\FolderResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FoldersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('folder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FolderResource(Folder::with(['project', 'folder'])->get());
    }

    public function store(StoreFolderRequest $request)
    {
        $folder = Folder::create($request->all());

        if ($request->input('files', false)) {
            $folder->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
        }

        return (new FolderResource($folder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Folder $folder)
    {
        abort_if(Gate::denies('folder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FolderResource($folder->load(['project', 'folder']));
    }

    public function update(UpdateFolderRequest $request, Folder $folder)
    {
        $folder->update($request->all());

        if ($request->input('files', false)) {
            if (!$folder->files || $request->input('files') !== $folder->files->file_name) {
                if ($folder->files) {
                    $folder->files->delete();
                }

                $folder->addMedia(storage_path('tmp/uploads/' . $request->input('files')))->toMediaCollection('files');
            }
        } elseif ($folder->files) {
            $folder->files->delete();
        }

        return (new FolderResource($folder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Folder $folder)
    {
        abort_if(Gate::denies('folder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $folder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
