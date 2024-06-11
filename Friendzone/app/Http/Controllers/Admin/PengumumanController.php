<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Product;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);
        return view('pages.admin.pengumuman.pengumuman', compact('pengumuman'));
    }

    public function create()
    {
        $products = Product::all();
        return view('pages.admin.pengumuman.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'menu_id' => 'required|exists:products,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $pengumuman = Pengumuman::create($validatedData);
        $pengumuman->product()->associate($request->menu_id);
        $pengumuman->save();

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil disimpan.');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pages.admin.pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $products = Product::all();
        return view('pages.admin.pengumuman.edit', compact('pengumuman', 'products'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'menu_id' => 'required|exists:products,id',
        ]);
    
        $pengumuman = Pengumuman::findOrFail($id);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        // Update pengumuman attributes
        $pengumuman->judul = $validatedData['judul'];
        $pengumuman->konten = $validatedData['konten'];
        $pengumuman->image = $validatedData['image'] ?? $pengumuman->image; // If image is not updated, keep the existing one
    
        // Update the associated product_id
        $pengumuman->product_id = $validatedData['menu_id'];
    
        // Save the updated pengumuman
        $pengumuman->save();
    
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diubah.');
    }
    

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Pengumuman berhasil dihapus',
        ]);
    }
}
