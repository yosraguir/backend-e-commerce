<?php

namespace App\Http\Helpers;
use Illuminate\Http\UploadedFile;

/**
 * @param  $file
 * @param string $type
 * @param string $customString
 * @param bool $storage
 * @return null|string
 */
function uploadFile(UploadedFile $file , $type = 'default', $customString = '', $storage = false)
{
    if ($file->isValid()) {
        $uploadAttributes = config("mimetypes.$type");
        $path = config("paths.$type");

        if ($storage) {
            $storagePath = storage_path($path);
        } else {
            $storagePath = $path;
        }

        if (isset($uploadAttributes[$file->getMimeType()])) {
            $name = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10) . '_' . time() . '.' . $uploadAttributes[$file->getMimeType()];


            if ($file->move($storagePath, $name)) {
                //resize if image
                if (isset($uploadAttributes['size'])) {
                    //todo implement resizing of images, require extention installation
                }

                return $path . '/' . $name;
            }
        }
    }
    return null;
}
?>
