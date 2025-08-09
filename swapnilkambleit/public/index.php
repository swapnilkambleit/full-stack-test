<?php
$APP_URL = 'http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/';
$GLOBALS['APP_URL'] = $APP_URL;
$GLOBALS['UPLOAD_DIR'] = __DIR__ . '/../uploads/';

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Routes/web.php';