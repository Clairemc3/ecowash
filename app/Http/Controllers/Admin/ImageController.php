<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
    * Returns a resource of all images in a given folder
    * @TODO - store these images with a record
    */
    public function index(string $folder)
    {
        return collect(Storage::disk('public')->files($folder))->map(function($file) {
            return Storage::url($file);
        });

    }
}
