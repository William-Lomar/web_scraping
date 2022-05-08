<?php
  include('config.php');
  $url = isset($_POST['url']) ? $_POST['url'] : '';
  include('requisicoes/requisicoes.php'); 
  libxml_use_internal_errors(true);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Web Scraping</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>css/style.css?hash=<?php echo filemtime(BASE_DIR.'/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>js/dist/css/select2.min.css">
</head>
<body>
  <div class="main">
    <form method="post">
    <input type="submit" name="reset" value="Reset" class="right btn btn-secondary">
    <div class="clear"></div>
    <h1>DoubleSix</h1>
    
    <div class="pesquisa">
      <h2>Pesquisar Anime (Somente o nome do anime)</h2>
      <input type="text" name="episodio">
      <div class="right">
        <input type="submit" name="pesquisa" value="Pesquisar" class="btn btn-success">
      </div>
      <div class="clear"></div>
    </div>


    </form>
  </div><!--main-->
  <script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/main.js?hash=<?php echo filemtime(BASE_DIR.'/js/main.js')?>"></script>
  <script src="<?php echo INCLUDE_PATH?>js/bootstrap.min.js"></script> 
</body>
</html>


