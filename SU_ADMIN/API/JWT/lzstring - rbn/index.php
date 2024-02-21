<?php
require __DIR__ . '/vendor/autoload.php';
$rawstr = "aku sayang kamu";
echo \LZCompressor\LZString::compressToBase64($rawstr);