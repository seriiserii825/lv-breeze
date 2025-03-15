<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, string $directory = 'uploads'): string
    {
        $filename = 'educode_'. uniqid() . '_' . $file->getClientOriginalExtension();
        $file->move(public_path($directory), $filename);
        return '/' . $directory . '/' . $filename;
    }
}

