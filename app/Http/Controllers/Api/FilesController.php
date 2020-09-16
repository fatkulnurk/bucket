<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        $files = scandir(storage_path('app/public'));
        $allFile = array_diff($files, ['.', '..', '.gitignore']);
        return response()->json($allFile, 200);
    }
}
