<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    public $data = [];

    function index() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $publicFolderPath = public_path('storage/files'); 
        $fileNames = scandir($publicFolderPath); 
        $fileNames = array_diff($fileNames, ['.', '..']);
        $fileNames = array_values($fileNames);
        
        $filesWithTime = [];
        
        foreach ($fileNames as $fileName) {
            $filePath = $publicFolderPath . '/' . $fileName;
            $fileTime = filectime($filePath); 
            $filesWithTime[] = [
                'name' => $fileName,
                'created_at' => date('Y-m-d H:i:s', $fileTime), // Định dạng thời gian
            ];
        }
    
        $data['files'] = $filesWithTime;
        return view('file.index', $data);
    }

    function viewUpload() {
        return view('upload.index');
    }

    function upload(Request $request) {
        if ($request->hasFile('file')) {
            $file = $request->file;
            $originalName = $file->getClientOriginalName();
            $file->move(public_path('storage/files'), $originalName);
        }
        return redirect()->route('file.index');
    }
}
