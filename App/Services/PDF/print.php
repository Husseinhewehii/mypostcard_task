<?php

if(isset($_POST['imageHTML'])){
    include './TCPDFService.php';
    $pdfService = new TCPDFService();
    $pdfService->generateImagePDF($_POST['imageHTML']);
}

?>