<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

if (!function_exists('get_file_url')) {
    function get_file_url(?string $filepath, string $disk = 'public')
    {
        return $filepath
            ? (URL::isValidUrl($filepath) ? $filepath : Storage::disk($disk)->url($filepath))
            : null;
    }
}

if (!function_exists('remove_files')) {
    function remove_files(string|array $paths, string $disk = 'public')
    {
        $paths = is_string($paths) ? [$paths] : $paths;
        $storage = Storage::disk($disk);
        $paths = array_map(fn($path) => str_replace($storage->url(''), '', $path), $paths);

        return $storage->delete($paths);
    }
}
