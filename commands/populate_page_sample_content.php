<?php
/**
 * Populate a page with sample content, for example, from a template's html
 * Also removes preloader
 */
//const TEMPLATE = '/var/www/fac/web/simplified.html';
const TEMPLATE = '/var/www/fac/web/static/templates/flattheme/index.html';
const PAGE_ID = 14;

require __DIR__ . '/../yii2helper/models/ModelB3tTrait.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$yiiConfig = require __DIR__ . '/../config/console.php';
new yii\web\Application($yiiConfig); // Do NOT call run() here

$page = \app\models\Page::findOne(PAGE_ID);
$html = file_get_contents(TEMPLATE);
$page->html = $html;
$save_result = $page->save(false);

echo "save result: $save_result";