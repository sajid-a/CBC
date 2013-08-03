<?php
require_once('VirusTotalApi.php');

/* Initialize the VirusTotalApi class. */
$api = new VirusTotalAPI('ba897318e591159536bca9a3a3a4aae73e74eb8fffa80594c4b8006e83f7941e');


/* Upload and scan a local file. */
$result = $api->scanFile('php.php');
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
echo $result->result;

?>
