<?php

namespace App\Traits;

use Intervention\Image\Facades\Image as FacadesImage;

trait WithResizeAndCompres
{
    // $imgName = $this->Foto->store('post_images', 'public', $this->Foto->hashName());
    // $img = FacadesImage::make(public_path('storage/' . $imgName));
    // $img->resize(450, null, function ($constraint) {
    //     $constraint->aspectRatio();
    // });
    // $img->save();
    public function resizeAndCompress($imageName, $width, $height = null, $path = 'storage/')
    {
        $img = FacadesImage::make(public_path('' . $path . '' . $imageName));
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            // $constraint->upsize();
        });
        $img->save();
        return $img;
    }
}
