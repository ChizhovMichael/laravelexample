<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class UploudProductImage extends Controller
{
    //
    public $falename;
    public $path;

    public function __construct($falename, $path)
    {
        $this->filename = $filename;
        $this->path = $path;
    }

    public function upload()
    {
        return $this->filename;
    }
}
