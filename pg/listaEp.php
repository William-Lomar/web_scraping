<?php 
  include('../config.php');

  $url = $_GET['link'];
  $n = array();

  $anime = explode('/', $url)[4];

  libxml_use_internal_errors(true);

  $html = file_get_contents($url);
        
  $doc = new DOMDocument();
  $doc->loadHTML($html);

  $paginas = $doc->getElementsByTagName('a');

  foreach ($paginas as $item) {
    $pg = strpos($item->getAttribute("href"), '/anime/');
    if ($pg != false) {
      $pg = $item->getAttribute("href");
    }
    $pg = explode('paged=', $pg);
    if (!isset($pg[1])) {
      continue;
    }
    $n[] = $pg[1];    
  } 

  if (count($n) == 0) {
    $html = file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML($html);

    $video = $doc->getElementsByTagName('a');

    foreach ($video as $key => $item) {
      $episodio = strpos($item->getAttribute("href"), '/play/');
      $nomeEp = $item->nodeValue;
      $nEp = explode('Episódio ', $nomeEp);

      if (!isset($nEp[1])) {
        continue;
      }

      if ($nEp[1] < 10) {
        $nEp[1] = '0'.$nEp[1];
      }

      $nEp[1] = str_replace(' (HD)', '', $nEp[1]);
      $nEp[1] = str_replace(' (FHD)', '', $nEp[1]);

      if ($episodio != false) {
        $baseAnimeyabu = $item->getAttribute("href");
        $videos[$nomeEp] = 'https://pitou.goyabu.com/'.$anime.'/'.$nEp[1].'.mp4+'.$baseAnimeyabu;
      }
    }
  }else{
    for ($i = 1; $i <= max($n); $i++) { 
      $html = file_get_contents($url.'?paged='.$i);
      $doc = new DOMDocument();
      $doc->loadHTML($html);

      $video = $doc->getElementsByTagName('a');

      foreach ($video as $key => $item) {
      $episodio = strpos($item->getAttribute("href"), '/play/');
      $nomeEp = $item->nodeValue;
      $nEp = explode('Episódio ', $nomeEp);

      if (!isset($nEp[1])) {
        continue;
      }

      if ($nEp[1] < 10) {
        $nEp[1] = '0'.$nEp[1];
      }

      $nEp[1] = str_replace(' (HD)', '', $nEp[1]);
      $nEp[1] = str_replace(' (FHD)', '', $nEp[1]);

        if ($episodio != false) {
          $baseAnimeyabu = $item->getAttribute("href");
          $videos[$nomeEp] = 'https://pitou.goyabu.com/'.$anime.'/'.$nEp[1].'.mp4+'.$baseAnimeyabu;
        }
      }
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
    <h2>Escolha o episódio</h2>
    <select name="url" class="select2">

    <?php foreach ($videos as $key => $value) { ?>
        <option value="<?php echo $value?>"><?php echo $key?></option>
      <?php } ?>
    </select> 

      <div>
        <h2>Qual será o nome do episódio?</h2>
        <input type="text" name="nome">
      </div> 

      <div style="margin: 10px" class="right">
        <input type="submit" name="baixar" class="btn btn-success" value="Baixar">
      </div>
      <div style="margin: 10px" class="right">
        <input type="submit" name="assistirOn" class="btn btn-secondary" value="Assistir online">
      </div>
      <div style="margin: 10px" class="right">
        <input style="width: 100%;" type="submit" name="assistirBase" class="btn btn-primary" value="Assistir no AnimeYabu">
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
