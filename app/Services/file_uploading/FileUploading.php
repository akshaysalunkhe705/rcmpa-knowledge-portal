<?php

namespace App\Services\file_uploading;

use App\Services\directory_service\DirectoryService;

class FileUploading
{
    public $request, $file, $id, $path, $validations;
    public function uploadFile()
    {
        if ($this->file != null) {
            if ((empty($this->request)) && (empty($this->path)) && (empty($this->file))) {
                return "Request And File And Path Can Not Be EMPTY";
            }
            if (!empty($this->validations)) {
                $this->request->validate([
                    $this->file => $this->validations,
                ]);
            }

            $imageName = time().rand(1,100) . '.' . $this->file->extension();
            if (!is_dir(public_path($this->path))) {
                // mkdir(public_path($this->path));
                $dirModel = new DirectoryService();
                $dirModel->createDir($this->path);
            }
            $this->file->move(public_path($this->path) . '/', $imageName);
            return $this->path . '/' . $imageName;
        }
    }

    // public function UploadFileAndUpdateInDB($ModelClass, $imageNamePath)
    // {
    //     if ($this->request->{$this->file} != null) {
    //         $model = $ModelClass::find($this->id);
    //         $model->{$this->file} = $imageNamePath;
    //         $model->save();
    //     }
    // }
}
