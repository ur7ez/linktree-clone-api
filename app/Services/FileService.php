<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class FileService
{
    /**
     * @param Model $model
     * @param Request $request
     * @return Model
     * @throws \Exception
     */
    public function updateImage(Model $model, Request $request)
    {
        $file = $request->file('image');
        if (!$file instanceof UploadedFile) {
            throw new \Exception('Request does not contain a valid image file');
        }
        $image = Image::make($file);

        if (!empty($model->image)) {
            $currentImage = public_path() . $model->image;
            if (
                file_exists($currentImage)
                && $currentImage != public_path() . '/user-placeholder.png'
                && $currentImage != public_path() . '/link-placeholder.png'
            ) {
                unlink($currentImage);
            }
        }
        $extension = $file->getClientOriginalExtension();
        $image->crop($request->width, $request->height, $request->left, $request->top);

        $name = time() . '.' . $extension;
        $path = DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $name;
        $image->save(public_path() . $path);
        $model->image = $path;

        return $model;
    }
}
