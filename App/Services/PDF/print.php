<?php


if(isset($_POST['imageSrc'])){
    include './TCPDFService.php';
    $pdfService = new TCPDFService();
    $pdfService->generateImagePDF($_POST['imageSrc']);
}
?>