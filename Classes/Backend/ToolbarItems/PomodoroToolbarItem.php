<?php

declare(strict_types=1);

namespace AO\Pomodoro\Backend\ToolbarItems;

use TYPO3\CMS\Backend\Toolbar\ToolbarItemInterface;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class PomodoroToolbarItem implements ToolbarItemInterface
{

    public function __construct()
    {
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $pageRenderer->loadRequireJsModule('TYPO3/CMS/Pomodoro/Pomodoro');
    }

    public function checkAccess(): bool
    {
        return true;
    }

    public function getItem(): string
    {
        return $this->getFluidTemplateObject('ToolbarItem.html')->render();
    }

    public function hasDropDown(): bool
    {
        return false;
    }

    public function getDropDown()
    {
        return '';
    }

    public function getAdditionalAttributes(): array
    {
        return [];
    }

    public function getIndex(): int
    {
        return 5;
    }

    protected function getFluidTemplateObject(string $templateFilename): StandaloneView
    {
        $view = GeneralUtility::makeInstance(StandaloneView::class);

        $view->setLayoutRootPaths(['EXT:pomodoro/Resources/Private/Layouts']);
        $view->setPartialRootPaths(['EXT:pomodoro/Resources/Private/Partials']);
        $view->setTemplateRootPaths(['EXT:pomodoro/Resources/Private/Templates']);
        $view->setTemplate($templateFilename);
        $view->getRequest()->setControllerExtensionName('Pomodoro');

        return $view;
    }
}
