<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen"/>
</head>
<body>

<?php
require_once __DIR__. '/../vendor/autoload.php';

//use phpQuery;

// instantiate and use the dompdf class
$pdf = new mPDF();
$pdf->WriteHTML('<h1>Hello world!</h1>');
$pdf->Output();

exit(1);
// Create a HTML object with a basic div container
phpQuery::newDocument();

$body = pq('<div>');
$div = pq('<div>');
$div->addClass('row')->text('hi there');

$div2 = pq('<div>');
$div2->addClass('row')->text('hi again');

$body->append($div)->append($div2);

// (Optional) Setup the paper size and orientation
$pdf->setPaper('A4', 'landscape');

// Render the HTML to ob
echo $body->html();

$output = ob_get_clean();
$pdf->loadHtml($output);
echo $output;
$pdf->render();

// Output the generated PDF to Browser
$pdf->stream();

?>
</body>
</html>

