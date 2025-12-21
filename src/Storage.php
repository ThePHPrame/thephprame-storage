<?php

namespace ThePHPrame\Storage;
use ThePHPrame\Core\Library\File;

class Storage{

    public static function storeFile(File $file,$location,$name){

        $location = ROOT_FOLDER."//Storage//".$location.$name;

        if(move_uploaded_file($file->tmpName,$location)){
            return $location.$name;
        }
        return null;
    }

    public static function getFile($name){
        $location = ROOT_FOLDER."//Storage//".$name;

        if(file_exists($location)) {
            $file = file_get_contents($location);

            return $file;
        }
        return null;
    }

    public static function deleteFile($name){
        $location = ROOT_FOLDER."//Storage//".$name;

        if(file_exists($location)){
            if(unlink($location)){
                return true;
            }
        }
        return false;
    }

    public static function createNewFile($location,$name,$content){
        $fp = fopen(ROOT_FOLDER."//Storage//".$location.$name,'w');
        fwrite($fp,$content);
        fclose($fp);
    }

    public static function fileExists($name){
        if(file_exists(ROOT_FOLDER."//".$name)){
            return true;
        }
        return false;
    }
}
