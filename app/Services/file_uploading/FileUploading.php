<?php

namespace App\Services\file_uploading;

use App\Services\directory_service\DirectoryService;

class FileUploading
{
    public $request, $attribute_name, $id, $path, $validations;
    public function uploadFile()
    {
        $imagePaths = array();
        for ($i = 0; $i < count($this->request->{$this->attribute_name}); $i++) {
            if ($this->request->{$this->attribute_name}[$i] != null) {
                $dirModel = new DirectoryService();
                $dirModel->createDir($this->path);

                if ((empty($this->request)) && (empty($this->path)) && (empty($this->attribute_name))) {
                    return "Request And File And Path Can Not Be EMPTY";
                }
                if (!empty($this->validations)) {
                    $this->request->validate([
                        $this->attribute_name => $this->validations,
                    ]);
                }

                $imageName = time() . '.' . $this->request->{$this->attribute_name}[$i]->extension();
                if (!is_dir(public_path($this->path))) {
                    mkdir(public_path($this->path));
                }
                $this->request->{$this->attribute_name}[$i]->move(public_path($this->path) . '/', $imageName);
                $imagePaths[] = $this->path . '/' . $imageName;
            }
        }
        return $imagePaths;
    }

    public function UploadFileAndUpdateInDB($ModelClass, $imageNamePath)
    {
        if ($this->request->{$this->attribute_name} != null) {
            $model = $ModelClass::find($this->id);
            $model->{$this->attribute_name} = $imageNamePath;
            $model->save();
        }
    }
}
