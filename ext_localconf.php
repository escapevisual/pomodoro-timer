<?php

defined('TYPO3_MODE') || die('Access denied.');

use ESCAPEVISUAL\Pomodoro\Backend\ToolbarItems\PomodoroToolbarItem;

$GLOBALS['TYPO3_CONF_VARS']['BE']['toolbarItems'][] = PomodoroToolbarItem::class;
