<?php

namespace App\Http\Controllers;
use App\Models\Kesiswaan;
use App\Models\Dokumen;
use File;
use Image;
use Illuminate\Http\Request;

class KesiswaanController extends Controller
{
    public function admin_kesiswaan()
    {

    }

    public function admin_edit_kesiswaan($id)
    {

    }

    public function admin_create_kesiswaan()
    {

    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_kesiswaan()
    {

    }
    
    public function remove_kesiswaan()
    {

    }
}
