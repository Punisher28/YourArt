<?php

namespace App\Http\Controllers;

use App\ImgItems;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function testaja(Request $request)
    {
//return $request->file('image')->getClientOriginalName();

        foreach ($request->file("image") as $image){
            $path = Storage::putFileAs('public/uploads/post_img', $image, random_int(0,5));
            echo $image->getClientOriginalName(), PHP_EOL, $path, PHP_EOL;
        }

        /*if($request->hasFile('file')) {
            echo 'test';
            foreach ($request->file("file") as $image) {
                $name=$image->getClientOriginalName();
                $path = Storage::putFile('public/uploads', $image);
                echo $image;
            }
        }*/
    }
}
