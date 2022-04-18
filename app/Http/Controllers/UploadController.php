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


}
