<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelLevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/database',
        __DIR__.'/resources/views',
    ]);

    // PHP 8.3 upgrade
    $rectorConfig->sets([
        SetList::PHP_83,
        LaravelLevelSetList::UP_TO_LARAVEL_110, // Update this for the Laravel version you want to upgrade to
    ]);

    // Optional: To keep your codebase clean and modern
    $rectorConfig->importNames();
    $rectorConfig->parallel();
};
