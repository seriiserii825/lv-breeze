<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, string $directory = 'uploads'): string
    {
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $full_file_name = $file_name .'.'. $file->getClientOriginalExtension();
        // check if file already exists in public/uploads directory
        if (file_exists(public_path($directory . '/' . $full_file_name))) {
            $full_file_name = $file_name . '_copy.' . $file->getClientOriginalExtension();
        }

        $file->move(public_path($directory), $full_file_name);
        return '/' . $directory . '/' . $full_file_name;
    }

    public function deleteFile(string $file_path): void
    {
        if (file_exists(public_path($file_path))) {
            unlink(public_path($file_path));
        }
    }
}

