<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ImageClass
{
    function Store(Request $request)
    {
       foreach ($request->files as $file) {
        $extension = $file->getClientOriginalExtension();
        $fileName =  $file->getPathName();
        $fname = uniqid(). "." . $extension;
        $Path = 'Images/' . $fname;
        ImageClass::uploadfile($fileName, $Path);
        return $Path;
        

       }
    }
    function uploadfile($tmp, $Path)
    {
      if (move_uploaded_file($tmp, $Path)) {
    
        return "image Uploaded";
      } else {
    
        return "image Uploaded Failed";
      }
    }



}
