<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

      /**
     * New image upload
     * @param $file,$folderName,$width,$height
     * @return \Illuminate\Http\Response
     */
    protected function imageUpload($file, $folderName, $width, $height)
    {
        if ($file) {
            $folder = 'uploads/'.$folderName;

            // if not have a folder create folder
            !File::exists($folder) ? File::makeDirectory($folder, 0777, true, true) : false;

            // rename image
            $imageFile = $file->getClientOriginalName();
            $imageNameReplace = str_replace([' ',':','\\', '/', '*','()'],'-',$imageFile);
            $imageEx = explode('.',$imageNameReplace);
            $image = $imageEx[0].'_'.rand(111,999).'.'.end($imageEx);

            if ($width != null && $height != null) { // width and height null value check
                Image::make($file)->resize($width, $height)->save($folder . $image); // resize image
                $path = $folder.$image;
            }
            else{
                $file->move($folder, $image); // not resize image
                $path = $folder.$image;
            }
        }
        else{
            $path = null;
        }

        return $path;
    }

    /**
     * New image upload with old image delete storage
     * @param $file,$folderName,$width,$height,$defaultImage
     * @return \Illuminate\Http\Response
     */
    protected function imageUpdate($file, $folderName, $width, $height, $oldImage)
    {
        if ($file) {
            $folder = 'uploads/'.$folderName;

            // old image delete from storage
            file_exists($oldImage) ? unlink($oldImage) : false;

            // if not have a folder create folder
            !File::exists($folder) ? File::makeDirectory($folder, 0777, true, true) : false;

            // rename image
            $imageFile = $file->getClientOriginalName();
            $imageNameReplace = str_replace([' ',':','\\', '/', '*','()'],'-',$imageFile);
            $imageEx = explode('.',$imageNameReplace);
            $image = $imageEx[0].'_'.rand(111,999).'.'.end($imageEx);

            if ($width != null && $height != null) { // width and height null value check
                Image::make($file)->resize($width, $height)->save($folder . $image); // resize image
                $path = $folder.$image;
            }
            else{
                $file->move($folder, $image); // not resize image
                $path = $folder.$image;
            }
            return $path;
        }
        else{
            return $oldImage;
        }

    }

     /**
     * Old image delete from storage
     * @param $oldImage
     * @return \Illuminate\Http\Response
     */
    protected function imageDelete($oldImage){
        if (file_exists($oldImage)) {
            $remove = unlink($oldImage);
        }
        else{
            $remove = false;
        }
        return $remove;
    }


    /**
     * blade title share
     * @param $title
     * @return \Illuminate\Http\Response
     */
    protected function setPageTitle($title = null)
    {
        view()->share(['title' => $title]);
    }
}
