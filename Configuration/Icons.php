<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'pomodoro-play' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:pomodoro/Resources/Public/Icons/timer-play.svg',
    ],
    'pomodoro-stop' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:pomodoro/Resources/Public/Icons/timer-stop.svg',
    ],
];
