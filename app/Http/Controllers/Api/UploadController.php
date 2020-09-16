<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpg,png,jpeg|max:10240'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'format berkas tidak didukung',
                'data' => $validator->getMessageBag()
            ], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = Str::random(15) . '---' . time() . '.' . $file->getClientOriginalExtension();
            $fileStore = $file->storeAs(
                'public', $filename
            );

            $fileDatabase = File::create([
                'code' => Str::random(12),
                'name' => $filename,
                'client_original_name' => $file->getClientOriginalName(),
                'client_original_mime_type' => $file->getClientMimeType(),
                'client_original_extension' => $file->getClientOriginalExtension(),
                'mime_type' => $file->getMimeType(),
                'storage_path' => $fileStore,
                'size' => $file->getSize(),
                'delete_key' => Str::random(22),
                'iterator' => Str::random(22),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berkas berhasil di upload',
                'data' => $fileDatabase
            ]);
        }
    }
}
