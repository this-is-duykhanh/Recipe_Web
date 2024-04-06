<?php
require_once './vendor/autoload.php';
include "./config/constants.php";

use Dompdf\Dompdf;
use Dompdf\Options;

// Initialize Dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $body = isset($_POST['body']) ? htmlspecialchars($_POST['body']) : '';
    
    $thumbnail = isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '';

    // Construct the URL of the image
    $url = ROOT_URL . 'images/' . $thumbnail;

    // Generate HTML content for PDF
    $html = "
        <div style='margin: auto; padding-left: 5rem'>
            <h1>$title</h1>
            <h3>Description</h3>

            <p>". nl2br($description)  ."</p>
            <h3>How to cook?</h3>

            <p>". nl2br($body)  ."</p>

        </div>
    ";

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4');

    $dompdf->render();

    $filename = $title . ".pdf";
    $dompdf->stream($filename);
    exit();
} else {
    echo "Form data not submitted!";
}
?>
