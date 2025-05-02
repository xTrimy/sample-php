<?php
require __DIR__ . '/../vendor/autoload.php';
include_once __DIR__ . '/../app/core/Asset.php';
$app = require_once __DIR__ . '/../app/core/App.php';
require_once __DIR__ . '/../app/core/View.php';

$app->run(__DIR__);