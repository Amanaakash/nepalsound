<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\SitePresentation;

class MissingUploadController extends Controller
{
    public function __invoke(string $path)
    {
        $relativePath = SitePresentation::uploadPath($path);

        foreach ([public_path(), base_path()] as $root) {
            $rootPath = realpath($root);
            $filePath = realpath(
                rtrim($root, '/\\') . DIRECTORY_SEPARATOR
                . str_replace('/', DIRECTORY_SEPARATOR, $relativePath)
            );

            if ($rootPath !== false
                && $filePath !== false
                && strpos($filePath, $rootPath . DIRECTORY_SEPARATOR) === 0
                && is_file($filePath)) {
                return response()->file($filePath);
            }
        }

        abort(404);
    }
}
