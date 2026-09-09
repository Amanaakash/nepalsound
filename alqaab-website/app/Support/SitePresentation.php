<?php

namespace App\Support;

class SitePresentation
{
    private const ASSET_DIRECTORY = 'assets/site/image';

    /**
     * Turn environment-specific local links into paths that Laravel can
     * generate against the current host and port.
     */
    public static function menuPath(?string $url): string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return '/';
        }

        $parts = parse_url($url);

        if ($parts === false || ! isset($parts['host'])) {
            return $url;
        }

        $host = strtolower($parts['host']);
        if (! in_array($host, ['127.0.0.1', 'localhost'], true)) {
            return $url;
        }

        $path = $parts['path'] ?? '/';
        $path = $path === '' ? '/' : '/' . ltrim($path, '/');

        if (isset($parts['query'])) {
            $path .= '?' . $parts['query'];
        }

        if (isset($parts['fragment'])) {
            $path .= '#' . $parts['fragment'];
        }

        return $path;
    }

    public static function logoPath(?string $storedPath, ?array $roots = null): string
    {
        return self::imagePath($storedPath, self::ASSET_DIRECTORY . '/LOGO.jpg', $roots);
    }

    public static function categoryPath(?string $storedPath, ?array $roots = null): string
    {
        return self::imagePath($storedPath, self::ASSET_DIRECTORY . '/blog1.webp', $roots);
    }

    public static function uploadPath(string $requestPath, ?array $roots = null): string
    {
        $requestPath = ltrim(str_replace('\\', '/', rawurldecode($requestPath)), '/');

        if ($requestPath === '' || strpos($requestPath, '..') !== false) {
            return self::ASSET_DIRECTORY . '/blog1.webp';
        }

        $directory = strtolower(strtok($requestPath, '/') ?: '');
        $fallbacks = [
            'setting' => self::ASSET_DIRECTORY . '/LOGO.jpg',
            'banner' => self::ASSET_DIRECTORY . '/blog4.jpg',
            'blog' => self::ASSET_DIRECTORY . '/blog1.webp',
            'blogcategory' => self::ASSET_DIRECTORY . '/blog1.webp',
            'rental' => self::ASSET_DIRECTORY . '/1.-Midas-M32-Live.webp',
            'rentalcategory' => self::ASSET_DIRECTORY . '/1.-Midas-M32-Live.webp',
            'albums' => self::ASSET_DIRECTORY . '/blog5.jpg',
            'gallery' => self::ASSET_DIRECTORY . '/blog5.jpg',
        ];

        return self::imagePath(
            'upload_file/' . $requestPath,
            $fallbacks[$directory] ?? self::ASSET_DIRECTORY . '/blog1.webp',
            $roots
        );
    }

    public static function blogPath(
        ?string $storedPath,
        ?string $title,
        int $position = 0,
        ?array $roots = null
    ): string {
        $title = strtolower((string) $title);

        if (strpos($title, 'everest') !== false || strpos($title, 'summit') !== false) {
            $fallback = self::ASSET_DIRECTORY . '/Namaste-Sound-On-the-top-of-Mount-Everest.jpg';
        } elseif (strpos($title, 'sound solutions') !== false) {
            $fallback = self::ASSET_DIRECTORY . '/blog1.webp';
        } else {
            $fallbacks = [
                self::ASSET_DIRECTORY . '/blog1.webp',
                self::ASSET_DIRECTORY . '/blog2.jpg',
                self::ASSET_DIRECTORY . '/blog3.jpg',
                self::ASSET_DIRECTORY . '/blog4.jpg',
                self::ASSET_DIRECTORY . '/blog5.jpg',
            ];
            $fallback = $fallbacks[abs($position) % count($fallbacks)];
        }

        return self::imagePath($storedPath, $fallback, $roots);
    }

    public static function servicePath(?string $storedPath, int $position = 0, ?array $roots = null): string
    {
        $fallbacks = [
            self::ASSET_DIRECTORY . '/services0.jpg',
            self::ASSET_DIRECTORY . '/services1.jpg',
            self::ASSET_DIRECTORY . '/services2.jpg',
            self::ASSET_DIRECTORY . '/sercices3.png',
            self::ASSET_DIRECTORY . '/services5.jpg',
            self::ASSET_DIRECTORY . '/Live-Event-Management-14-scaled.webp',
            self::ASSET_DIRECTORY . '/mixer.jpg',
            self::ASSET_DIRECTORY . '/Stage-1.webp',
        ];

        return self::imagePath($storedPath, $fallbacks[abs($position) % count($fallbacks)], $roots);
    }

    /**
     * Preserve a real upload, recover its original filename from the bundled
     * asset directory when possible, and only then use the supplied fallback.
     */
    public static function imagePath(?string $storedPath, string $fallback, ?array $roots = null): string
    {
        $storedPath = trim((string) $storedPath);

        if ($storedPath !== '' && self::isRemoteUrl($storedPath)) {
            return $storedPath;
        }

        $relativePath = self::relativePath($storedPath);
        $roots = self::roots($roots);

        if ($relativePath !== '' && self::existsInRoots($relativePath, $roots)) {
            return $relativePath;
        }

        $recovered = self::recoverBundledAsset($relativePath, $roots);

        return $recovered ?? ltrim(str_replace('\\', '/', $fallback), '/');
    }

    private static function recoverBundledAsset(string $relativePath, array $roots): ?string
    {
        if ($relativePath === '') {
            return null;
        }

        $filename = rawurldecode(basename(str_replace('\\', '/', $relativePath)));
        $filename = preg_replace('/^(?:\d+_)+/', '', $filename) ?? $filename;

        foreach ($roots as $root) {
            $assetDirectory = rtrim($root, '/\\') . DIRECTORY_SEPARATOR
                . str_replace('/', DIRECTORY_SEPARATOR, self::ASSET_DIRECTORY);

            if (! is_dir($assetDirectory)) {
                continue;
            }

            foreach (scandir($assetDirectory) ?: [] as $candidate) {
                if (strcasecmp($candidate, $filename) === 0) {
                    return self::ASSET_DIRECTORY . '/' . $candidate;
                }
            }
        }

        return null;
    }

    private static function relativePath(string $path): string
    {
        if ($path === '') {
            return '';
        }

        $parts = parse_url($path);
        $pathOnly = is_array($parts) && isset($parts['path']) ? $parts['path'] : $path;

        return ltrim(str_replace('\\', '/', rawurldecode($pathOnly)), '/');
    }

    private static function existsInRoots(string $relativePath, array $roots): bool
    {
        $nativePath = str_replace('/', DIRECTORY_SEPARATOR, $relativePath);

        foreach ($roots as $root) {
            if (is_file(rtrim($root, '/\\') . DIRECTORY_SEPARATOR . $nativePath)) {
                return true;
            }
        }

        return false;
    }

    private static function roots(?array $roots): array
    {
        if ($roots !== null) {
            return array_values(array_unique($roots));
        }

        $detected = [];
        if (function_exists('public_path')) {
            $detected[] = public_path();
        }
        if (function_exists('base_path')) {
            $detected[] = base_path();
        }

        return array_values(array_unique($detected));
    }

    private static function isRemoteUrl(string $path): bool
    {
        $parts = parse_url($path);

        return is_array($parts)
            && isset($parts['scheme'], $parts['host'])
            && ! in_array(strtolower($parts['host']), ['127.0.0.1', 'localhost'], true);
    }
}
