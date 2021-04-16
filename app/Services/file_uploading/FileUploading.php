<?php

namespace App\Services\file_uploading;

use App\Services\directory_service\DirectoryService;

class FileUploading
{
    public $request, $attribute_name, $id, $path, $validations, $nth_number_of_image;
    public function uploadFile()
    {
        if ($this->request->{$this->attribute_name} != null) {
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

            $imageName = time() . '.' . $_FILES[''.$this->attribute_name.'']['name'][$this->nth_number_of_image]; //$this->request->{$this->attribute_name}[$this->nth_number_of_image]->extension();
            if (!is_dir(public_path($this->path))) {
                mkdir(public_path($this->path));
            }
            $this->request->{$this->attribute_name}->move(public_path($this->path) . '/', $imageName);
            return $this->path . '/' . $imageName;
        }
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
