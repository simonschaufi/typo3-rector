<?php

use TYPO3\CMS\Core\Html\RteHtmlParser;

$rteHtmlParser = new RteHtmlParser();
$rteHtmlParser->HTMLcleaner_db('arg1', 'arg2');
$rteHtmlParser->getKeepTags('arg1', 'arg2');
$rteHtmlParser->getUrl('http://domain.com');
$rteHtmlParser->siteUrl();

?>
-----
<?php

use TYPO3\CMS\Core\Html\RteHtmlParser;

$rteHtmlParser = new RteHtmlParser();
$rteHtmlParser->HTMLcleaner_db('arg1');
$rteHtmlParser->getKeepTags('arg1');
\TYPO3\CMS\Core\Utility\GeneralUtility::getUrl('http://domain.com');
\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL');

?>
