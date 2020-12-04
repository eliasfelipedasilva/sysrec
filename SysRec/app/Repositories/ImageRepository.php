<?php

namespace App\Repositories;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class ImageRepository
{
    public function saveImage($image, $id, $type, $size)
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . random_int(100, 999) .'.' . $extension; 
            $destinationPath = public_path('images/'.$type.'/'.$id.'/');
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/'.$id.'/'.$fileName;
            $fullPath = $destinationPath.$fileName;
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775,true);
            }
            $image = Image::make($file)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg');
            $image->save($fullPath, 100);
            return $url;
        } else {
            return 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$type.'/placeholder300x300.jpg';
        }   
    }
}

?>