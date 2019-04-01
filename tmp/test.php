<?php
require_once "../vendor/autoload.php";

use yii2helper\PHPHelper;

echo '<pre>';
$addresses = ['406 Pier View Way, Oceanside, CA 92054', '4513 3RD STREET, CIRCLE WEST, CA 48457-2389'];
foreach ($addresses as $address) {
    print_r(PHPHelper::parse_address($address));
}