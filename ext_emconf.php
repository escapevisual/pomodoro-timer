<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Pomodoro Timer',
    'description' => 'Simple Pomodoro Timer for TYPO3.',
    'category' => 'be',
    'author' => 'By Ana',
    'author_email' => 'aniio@gmx.net',
    'state' => 'beta',
    'uploadfolder' => '0',
    'clearCacheOnLoad' => 0,
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'ESCAPEVISUAL\\Pomodoro\\' => 'Classes/',
        ],
    ],
];
