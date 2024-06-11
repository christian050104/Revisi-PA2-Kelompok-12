<?php

namespace App\Http\Controllers\Web;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(4);

        return view('pages.web.gallery.index', compact('galleries'));
    }
}
