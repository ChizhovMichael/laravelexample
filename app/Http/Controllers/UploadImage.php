<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\TvImg;
use App\PartImg;

class UploadImage extends Controller
{
    //
    public $file;
    public $companyId;
    public $tvId;
    public $cls;
    public $productId;


    public function __construct($file, $companyId, $tvId, $cls, $productId)
    {
        $this->file = $file;
        $this->companyId = $companyId;
        $this->tvId = $tvId;
        $this->cls = $cls;
        $this->productId = $productId;
    }

    public function upload()
    {
        $this->uploadMain();
        $this->uploadResize();

        
    }

    public function uploadMain()
    {
        $file = $this->file;
        
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // save to img/products as the new $filename
        $path = $file->storeAs( $this->companyId . '/' . $this->tvId, $filename, 'products' );

        if ($this->cls == 'TvImg')
        {
            TvImg::create([
                'tv_img_name' => $filename,
                'tv_id'  => $this->tvId
            ]);
        }

        if ($this->cls == 'PartImg')
        {
            PartImg::create([
                'part_img_name' => $filename,
                'product_id' => $this->productId
            ]);
        }

        

        return $path;

    }

    public function uploadResize()
    {
        $file = $this->file;
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'm' . time() . '.' . $file->getClientOriginalExtension();

        // save to img/products as the new $filename
        $path = $file->storeAs( $this->companyId . '/' . $this->tvId, $filename, 'products' );
        
        // save file path
        $saveFile = Storage::disk('products')->getAdapter()->getPathPrefix() . $path;
        
        // resize the image to a width of 350 and constrain aspect ratio (auto height)
        $resizeFile = Image::make($saveFile)->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        

        return $resizeFile->save($saveFile);
    }
}
