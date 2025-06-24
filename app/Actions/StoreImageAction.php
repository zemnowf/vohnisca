<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StoreImageAction
{
    public function execute(UploadedFile $file): string
    {
        $path = Storage::disk('public')->putFile('images', $file);
        return '/storage/' . $path;
    }
}
