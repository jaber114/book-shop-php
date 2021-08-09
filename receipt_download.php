<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$document = new Dompdf();
$s=' <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css files/receipt.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
$s.='<div class="invoice-box">
<table cellpadding="0" cellspacing="0">
    <tr class="top">
        <td colspan="2">
            <table>';
$s.='<tr>
<td class="title">
    <img src="website logo/logo.jpg" style="width: 150%; max-width: 180px" />
</td>
<td>';
$s.='Invoice #:';
$s.=date("d-m-Y h:i:s");
$document->loadHtml(require('Receipt.php'));
//set page size and orientation
$document->setPaper('A4', 'landscape');
//Render the HTML as PDF
$document->render();
//Get output of generated pdf in Browser
$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview
?>
