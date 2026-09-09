<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $_panel = 'Certificate';
        $certificates = Certificate::latest()->get();
        return view('admin.certificate.index', compact('certificates', '_panel'));
    }

    public function create()
    {
        $_panel = 'Certificate';
        return view('admin.certificate.create', compact('_panel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'imagth' => 'nullable|image|max:2048',
            'short_description' => 'nullable',
        ]);

        $certificate = new Certificate();
        $certificate->title = $request->title;
        $certificate->short_description = $request->short_description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'uploads/certificates/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $certificate->image = $path . $filename;
        }

        if ($request->hasFile('imagth')) {
            $file = $request->file('imagth');
            $path = 'uploads/certificates/thumbnails/';
            $filename = time() . '_thumb_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $certificate->imagth = $path . $filename;
        }

        $certificate->save();
        return redirect()->route('certificate.index')->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        $_panel = 'Certificate';
        return view('admin.certificate.edit', compact('certificate', '_panel'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'imagth' => 'nullable|image|max:2048',
            'short_description' => 'nullable',
        ]);

        $certificate->title = $request->title;
        $certificate->short_description = $request->short_description;

        if ($request->hasFile('image')) {
            if ($certificate->image && file_exists($certificate->image)) {
                unlink($certificate->image);
            }

            $file = $request->file('image');
            $path = 'uploads/certificates/';
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $certificate->image = $path . $filename;
        }

        if ($request->hasFile('imagth')) {
            if ($certificate->imagth && file_exists($certificate->imagth)) {
                unlink($certificate->imagth);
            }

            $file = $request->file('imagth');
            $path = 'uploads/certificates/thumbnails/';
            $filename = time() . '_thumb_' . $file->getClientOriginalName();
            $file->move($path, $filename);
            $certificate->imagth = $path . $filename;
        }

        $certificate->save();
        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image && file_exists($certificate->image)) {
            unlink($certificate->image);
        }

        if ($certificate->imagth && file_exists($certificate->imagth)) {
            unlink($certificate->imagth);
        }

        $certificate->delete();
        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully.');
    }
  
}