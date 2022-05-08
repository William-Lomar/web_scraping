<?php 
  include('../config.php');
  libxml_use_internal_errors(true);

  $url = $_GET['link'];
  $nome = $_GET['nome'].'.mp4';

  $html = file_get_contents($url);
  
  $doc = new DOMDocument();
  $doc->loadHTML($html);

  $video = $doc->getElementsByTagName('source');

  foreach ($video as $item) {
    $videos[] = $item->getAttribute("src");
  }

  $file_url = $videos[0];

 header('Content-Type: application/octet-stream');
 header("Content-Transfer-Encoding: Binary"); 
 header("Content-disposition: attachment; filename=".$nome); 
 readfile($file_url);
?>

