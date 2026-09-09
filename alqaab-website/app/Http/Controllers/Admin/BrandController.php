<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $_panel = 'Brand';
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands', '_panel'));
    }

    public function create()
    {
        $_panel = 'Brand';
        return view('admin.brand.create', compact('_panel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand = new Brand();
        $brand->title = $request->title;
        $brand->url = $request->url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'uploads/brands/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $brand->image = $path . $filename;
        }

        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        $_panel = 'Brand';
        return view('admin.brand.edit', compact('brand', '_panel'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $brand->title = $request->title;
        $brand->url = $request->url;

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($brand->image && file_exists($brand->image)) {
                unlink($brand->image);
            }

            $file = $request->file('image');
            $path = 'uploads/brands/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $brand->image = $path . $filename;
        }

        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->image && file_exists($brand->image)) {
            unlink($brand->image);
        }

        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }
}