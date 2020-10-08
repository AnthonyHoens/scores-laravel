<?php


namespace App\upload;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

Trait UploadImage {
    public function HandleImage($request, $newName) {
        if ($request->hasFile('img')) {
            $file = $request->file('img');

            Storage::makeDirectory('/images/small/');

            $path = '/images/small/' . $newName;
            $resize = Image::make($file)->resize(40, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            $resize->save(public_path($path));


            Storage::makeDirectory('/images/big/');

            $path = '/images/big/' . $newName;
            $resize = Image::make($file)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            $resize->save(public_path($path));
        }
    }
}
