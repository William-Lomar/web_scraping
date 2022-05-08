<?php 
  if (isset($_POST['reset'])) {
    $urlLocal = INCLUDE_PATH;
    echo "<script>location.href='".$urlLocal."'</script>";
  }

    if (isset($_POST['baixar'])) {
    $link = $_POST['url'];
    $link = explode('+', $link)[0];
    $nome = $_POST['nome'];
    $destino = INCLUDE_PATH.'baixar.php?link='.$link.'&nome='.$nome;
    echo "<script>window.open('".$destino."', '_blank')</script>";  
  }

  if (isset($_POST['lista'])) {
    $link = $_POST['url'];
    $destino = INCLUDE_PATH.'pg/lista.php?link='.$link;
    echo "<script>location.href='".$destino."'</script>";
  }

  if (isset($_POST['pesquisa'])) {
    $episodio = generateSlug($_POST['episodio']);
    $link = 'https://animeyabu.com/?s='.$episodio;
    $destino = INCLUDE_PATH.'pg/lista.php?link='.$link;
    echo "<script>location.href='".$destino."'</script>";
  }

  if (isset($_POST['listaEp'])) {
    $link = $_POST['url'];
    $destino = INCLUDE_PATH.'pg/listaEp.php?link='.$link;
    echo "<script>location.href='".$destino."'</script>";
  }

  if (isset($_POST['assistirOn'])) {
    $link = $_POST['url'];
    $destino = explode('+', $link)[0];
    echo "<script>window.open('".$destino."', '_blank')</script>";  
  }

  if (isset($_POST['assistirBase'])) {
    $link = $_POST['url'];
    $destino = explode('+', $link)[1];
    echo "<script>window.open('".$destino."', '_blank')</script>";  
  }

  

?>
