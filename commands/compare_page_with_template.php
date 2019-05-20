<?php
/**
 * Compare a backend page with a template's html
 */
//const TEMPLATE = '/var/www/fac/web/simplified.html';
const TEMPLATE = '/var/www/fac/web/static/templates/flattheme/index.html';
const PAGE_ID = 14;
const TEMP_FILE = '/var/www/fac/tmp/page_to_compare.html';

require __DIR__ . '/../yii2helper/models/ModelB3tTrait.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$yiiConfig = require __DIR__ . '/../config/console.php';
new yii\web\Application($yiiConfig); // Do NOT call run() here

$page = \app\models\Page::findOne(PAGE_ID);
$html =  $page->html;

if (file_put_contents(TEMP_FILE, $html) === false) die('Cant print to file');

exec("meld ". TEMPLATE. " " . TEMP_FILE);