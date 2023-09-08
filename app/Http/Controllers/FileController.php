<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function viewUpload() {
        return view('upload.index');
    }

    function upload(Request $request) {
        if ($request->hasFile('file')) {
            $file = $request->file;
            $originalName = $file->getClientOriginalName();
            $file->move(public_path('file-uploads'), $originalName);
        }
        return redirect()->route('file.upload');
    }
}
