<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FilesController extends Controller
{
    public function show($code)
    {
        $file = File::where('code', $code)->first();
        if (blank($file)) {
            abort(404, 'file not found');
        }

        return Inertia::render('Files/Show', [
            'file' => $file
        ]);
    }

    public function edit($code, Request $request)
    {
        $file = File::where('code', $code)
            ->where('id', $request->query('id'))
            ->where('delete_key', $request->query('delete_key'))
            ->where('iterator', $request->query('iterator'))
            ->first();

        if (blank($file)) {
            abort(404, 'file not found');
        }

        abort(500);
    }
}
