<?php
/**
 * Converts a xlsx file into csv using ssconvert
 * Input $_FILE
 * Output a link to grab csv file
 */

// respond to preflights
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // return only the headers and not the content
    // only allow CORS if we're doing a GET - i.e. no saving for now.
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); //...
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

if (!$_FILES['file']['name']){
    echo 'No file uploaded'; exit(0);
}

$file_name = $_FILES['file']['name'];
$uploaded_file = $_FILES['file']['tmp_name'];
$f = fopen($uploaded_file, "r");

if (strpos($file_name, "xls") == false){
    echo 'We need to convert xls or xlsx file'; exit(0);
}

//now convert uploaded_file into /tmp/ folder

exec("rm /var/www/html/web/common/library/unix/tmp/csv_from_xls.csv");
$output = '';
$return_var = '';
$convert_result = exec("ssconvert  --export-type=Gnumeric_stf:stf_csv $uploaded_file /var/www/html/web/common/library/unix/tmp/csv_from_xls.csv", $output, $return_var);

if ($return_var == 0){
    echo json_encode(array('status'=>'successful'));
} else {
    echo json_encode(array('status'=>'failed'));
}
