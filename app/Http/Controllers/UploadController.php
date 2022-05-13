<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryFile;

class UploadController extends Controller
{
    public function storeLogo(Request $request){

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/logos/tmp/' . $folder, $filename);


            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }

    public function storeAdImage(Request $request){

        if($request->hasFile('adImage')){
            $file = $request->file('adImage');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/adImage/tmp/' . $folder, $filename);


            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }


    public function storeProperties(Request $request){

            if($request->hasFile('properties')){

                $files = $request->file('properties');

                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $folder = uniqid();
                    $folder = uniqid() . '-' . now()->timestamp;
                    $file->storeAs('public/properties/tmp/' . $folder, $filename);

                    TemporaryFile::create([
                        'folder' => $folder,
                        'filename' => $filename
                    ]);

                    return $folder;
                }
            }

        return '';
    }


}
