<?php
require_once('VirusTotalApi.php');

/* Initialize the VirusTotalApi class. */
$api = new VirusTotalAPI('Your-API-key');

/* Get a file report. */
$report = $api->getFileReport('Hash-of-a-file-to-check-for-a-report');
$api->displayResult($report);
print($api->getSubmissionDate($report) . '<br>');
print($api->getReportPermalink($report, TRUE) . '<br>');

/* Upload and scan a local file. */
$result = $api->scanFile('Relativ-path-to-a-local-file-to-scan');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
$api->displayResult($result);

/* Get an URL report. */
$report = $api->getURLReport('URL-to-check-for-a-report');
$api->displayResult($report);
print($api->getTotalNumberOfChecks($report) . '<br>');
print($api->getNumberHits($report) . '<br>');
print($api->getReportPermalink($report, FALSE) . '<br>');

/* Scan an URL. */
$result = $api->scanURL('URL-to-scan');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
$api->displayResult($result);

/* Comment on a file. */
$report = $api->makeCommentOnFile('Hash-of-a-file-to-comment-on', 'Your-comment');
$api->displayResult($report);

/* Comment on an URL. */
$report = $api->makeCommentOnURL('URL-to-comment-on', 'Your-comment');
$api->displayResult($report);
?>