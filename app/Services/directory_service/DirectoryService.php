<?php
namespace App\Services\directory_service;

class DirectoryService{
    public function createDir($path)
    {
        if(!empty($path)){
            $path_array = explode('/',$path);
            for ($i=0; $i < count($path_array); $i++) {
                if ($i==0) {
                    $path_array[$i] = $path_array[$i];
                }else{
                    $path_array[$i] = $path_array[$i-1].'/'.$path_array[$i];
                }
                if(!is_dir($path_array[$i])){
                    mkdir($path_array[$i]);
                }
            }
            return true;
        }
        return false;
    }

    public function deleteAndCreateDir($path, $type)
    {
        if(!empty($path)){
            $path_array = explode('/',$path);
            for ($i=0; $i < count($path_array); $i++) {
                if ($i==0) {
                    if($type == "ALL"){
                        $this->deleteDirectory($path_array[$i]);
                    }elseif($type == "SINGLE"){
                        rmdir($path);
                    }
                    $path_array[$i] = $path_array[$i];
                }else{
                    $path_array[$i] = $path_array[$i-1].'/'.$path_array[$i];
                }
                if(!is_dir($path_array[$i])){
                    mkdir($path_array[$i]);
                }
            }
            return true;
        }
        return false;
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) { return true; }
        if (!is_dir($dir)) { return unlink($dir); }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
}