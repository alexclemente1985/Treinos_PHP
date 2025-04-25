<?php
    require "vendor/autoload.php"; //necessário para o funcionamento do dompdf
    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    ob_start(); //Armazena buffer de saída com o que vier abaixo do comando
    require "conteudo-pdf.php";
    $html = ob_get_clean(); //joga o conteúdo de conteudo-pdf dentro da variável e limpa o buffer
    
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream();
?>