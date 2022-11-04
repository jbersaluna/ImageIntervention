<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $img = Image::canvas(1000, 600, '#ffEE5');
        return $img->response();
        // return phpinfo();
    }
}
