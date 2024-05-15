<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Modulo UI',
    'siteDescription' => 'Modulo UI',

    // Algolia DocSearch credentials
    'docsearchApiKey' => env('DOCSEARCH_KEY'),
    'docsearchIndexName' => env('DOCSEARCH_INDEX'),

    // navigation menu
    'navigation' => include_once 'navigation.php',

    // helpers
    'isActive' => static function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => static function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(
                static function ($child) use ($page) {
                    return trimPath($page->getPath()) === trimPath($child);
                }
            );
        }
    },
    'url' => static function ($page, $path) {
        return Str::startsWith($path, 'http') ? $path : '/'.trimPath($path);
    },
];
