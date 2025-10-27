<?php

use Illuminate\Http\UploadedFile;

/**
 * Upload a file with optional old file deletion
 *
 * @param UploadedFile $file The uploaded file from request
 * @param string $folder The folder inside storage/app/public to save the file
 * @param string|null $oldFilePath Optional: old file path to delete
 * @return string The path of the stored file
 */

function uploadFiles(UploadedFile|array $files, string $folder, string|array|null $oldFiles = null): string|array
{
    $paths = [];

    // Convert single file to array for uniform processing
    $files = is_array($files) ? $files : [$files];

    // Convert old files to array
    $oldFiles = is_array($oldFiles) ? $oldFiles : ($oldFiles ? [$oldFiles] : []);

    // Delete old files
    foreach ($oldFiles as $oldFile) {
        $pulicFile = public_path('storage/' . $oldFile);

        if ($oldFile && file_exists($pulicFile)) {
            unlink($pulicFile);
        }
    }

    // Upload new files
    foreach ($files as $file) {
        if ($file instanceof UploadedFile) {
            // Generate unique file name
            $fileName = time() . '-' . uniqid() . '-' . $file->getClientOriginalName();

            // Store file
            $paths[] = $file->storeAs($folder, $fileName, 'public');
        }
    }

    // Return single string if only one file uploaded
    return count($paths) === 1 ? $paths[0] : $paths;
}
