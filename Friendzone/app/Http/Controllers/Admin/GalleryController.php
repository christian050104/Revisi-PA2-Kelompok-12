<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $galleries = Gallery::where('title', 'like', '%' . $request->keyword . '%')
                ->paginate(6);
            return view('pages.admin.gallery.list', compact('galleries'));
        }
        return view('pages.admin.gallery.main');
    }

    public function create()
    {
        return view('pages.admin.gallery.input', ['gallery' => new Gallery]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/gallery'), $filename);

        Gallery::create([
            'title' => $request->title,
            'image_path' => 'images/gallery/' . $filename,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri berhasil ditambahkan',
            'redirect' => route('admin.gallery.index')
        ]);
    }

    public function show(Gallery $gallery)
    {
        return view('pages.admin.gallery.show', ['gallery' => $gallery]);
    }

    public function edit(Gallery $gallery)
    {
        return view('pages.admin.gallery.input', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validators->errors()->first(),
            ]);
        }

        $data = ['title' => $request->title];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/gallery'), $filename);
            $data['image_path'] = 'images/gallery/' . $filename;

            if (file_exists(public_path($gallery->image_path))) {
                unlink(public_path($gallery->image_path));
            }
        }

        $gallery->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri berhasil diperbarui',
            'redirect' => route('admin.gallery.index')
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        $file = public_path($gallery->image_path);
        if (file_exists($file)) {
            unlink($file);
        }

        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Galeri berhasil dihapus',
        ]);
    }
}
