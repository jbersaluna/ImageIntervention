<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use App\Models\File;
use Inertia\Inertia;

class TestController extends Controller
{
    public function index()
    {
        $datas = File::latest()->get();
        return Inertia::render('Test/Index', [
            'datas' => $datas,
        ]);
    }

    public function uploadImage()
    {
        $img = Request::file('file');
        $filename = $img->getClientOriginalName();
        $image_resize = Image::make($img->getRealPath());
        $image_resize->resize(300, 100);
        $image_resize->save(public_path('storage/images/' .$filename, 90));
        File::create([
            'name' => Request::input('name'),
            'image' => $filename,
        ]);
        
        return Redirect::route('index');
    }

    public function createCanva()
    {
        $img = Image::canvas(800, 600, '#ff0000')->resize(50, 50);
        File::create([
            'name' => 'canva',
            'image' => $img,
        ]);
        return $img->response();
    }
}
