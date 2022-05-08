<?php
   $file_url = $_GET['link'];
   $nome = $_GET['nome'];

   header('Content-Type: application/octet-stream');
   header("Content-Transfer-Encoding: Binary"); 
   header("Content-disposition: attachment; filename=".$nome.'.mp4'); 
   readfile($file_url); // do the double-download-dance (dirty but worky) 
?>
