<?php

declare(strict_types=1);

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use function Rector\SymfonyPhpConfig\inline_value_objects;
use Ssch\TYPO3Rector\Rector\Core\Html\RteHtmlParserRector;
use Ssch\TYPO3Rector\Rector\Core\TimeTracker\TimeTrackerGlobalsToSingletonRector;
use Ssch\TYPO3Rector\Rector\Core\Utility\RefactorRemovedMethodsFromGeneralUtilityRector;
use Ssch\TYPO3Rector\Rector\Extbase\RemovePropertyUserAuthenticationRector;
use Ssch\TYPO3Rector\Rector\Fluid\View\ChangeMethodCallsForStandaloneViewRector;
use Ssch\TYPO3Rector\Rector\Frontend\ContentObject\RefactorRemovedMethodsFromContentObjectRendererRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/services.php');

    $services = $containerConfigurator->services();

    $services->set(ChangeMethodCallsForStandaloneViewRector::class);

    $services->set(RefactorRemovedMethodsFromGeneralUtilityRector::class);

    $services->set(RefactorRemovedMethodsFromContentObjectRendererRector::class);

    $services->set(RemovePropertyUserAuthenticationRector::class);

    $services->set(TimeTrackerGlobalsToSingletonRector::class);

    $services->set(RteHtmlParserRector::class);

    $services->set(RenameMethodRector::class)
        ->call('configure', [[
            RenameMethodRector::METHOD_CALL_RENAMES => inline_value_objects([
                new MethodCallRename('TYPO3\CMS\Recordlist\RecordList', 'printContent', 'mainAction'),
                new MethodCallRename(
                    'TYPO3\CMS\Recordlist\Controller\ElementBrowserFramesetController',
                    'printContent',
                    'mainAction'
                ),
                new MethodCallRename('TYPO3\CMS\Rtehtmlarea\Controller\UserElementsController', 'main', 'main_user'),
                new MethodCallRename(
                    'TYPO3\CMS\Rtehtmlarea\Controller\UserElementsController',
                    'printContent',
                    'mainAction'
                ),
                new MethodCallRename('TYPO3\CMS\Rtehtmlarea\Controller\ParseHtmlController', 'main', 'main_parse_html'),
                new MethodCallRename(
                    'TYPO3\CMS\Rtehtmlarea\Controller\ParseHtmlController',
                    'printContent',
                    'mainAction'
                ),
            ]),
        ]]);
};
