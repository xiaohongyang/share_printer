<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/7/27
 * Time: 23:46
 */

namespace App\Http\Helpers;


class FileHelper
{

    public static function getFileName($fileFullName){

        $result = $fileFullName;
        $arr = explode(".", $fileFullName);
        if(is_array($arr) && count($arr) > 1) {
            array_pop($arr);
            $result = implode('.', $arr);
        }
        return $result;
    }

    public static function getFileExt($fileFullName){

        $result = "";
        $arr = explode(".", $fileFullName);
        if(is_array($arr) && count($arr) > 1) {
            $result = array_pop($arr);
        }
        return $result;
    }

}