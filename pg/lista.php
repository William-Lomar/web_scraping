<?php 
  include('../config.php');

  $url = $_GET['link'];
    
  libxml_use_internal_errors(true);

  $html = file_get_contents($url);
        
  $doc = new DOMDocument();
  $doc->loadHTML($html);

  $video = $doc->getElementsByTagName('a');

  foreach ($video as $item) {
    $episodio = strpos($item->getAttribute("href"), '/anime/');

    if ($episodio != false) {
      $videos[$item->nodeValue] = $item->getAttribute("href");
    }
  }
  include('../requisicoes/requisicoes.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Baixar Videos</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>css/style.css?hash=<?php echo filemtime(BASE_DIR.'/css/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>js/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/bootstrap.min.css">
</head>
<body>
  <div class="main">

    <form method="post">
    <input type="submit" name="reset" value="Reset" class="right btn btn-secondary">
    <div class="clear"></div>

    <h1>DoubleSix</h1>
    <?php if (isset($videos)) { ?>

    <h2>Escolha o anime</h2>
    <select name="url" class="select2">

    <?php foreach ($videos as $key => $value) { ?>
        <option value="<?php echo $value?>"><?php echo $key?></option>
      <?php } ?>
    </select> 
   
       <div style="margin:10px" class="right">
        <input type="submit" name="listaEp" class="btn btn-primary" value="Lista de episódios">
      </div>
      <div class="clear"></div>
    </form>
    <?php } ?>
  </div>
<script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/dist/js/select2.min.js"></script>  
<script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/main.js?hash=<?php echo filemtime(BASE_DIR.'/js/main.js')?>"></script>

</body>
</html>
