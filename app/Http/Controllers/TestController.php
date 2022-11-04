<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        //create a color yellow blank canva
        // $img = Image::canvas(1000, 600, '#ffEE5');

        // create a new image resource from file
        $img = Image::make('wallpaper.jpg');
        return $img->response();
    }
}
