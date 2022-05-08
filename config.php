<?php
 define('INCLUDE_PATH', 'http://seu_caminho/webscraping/');
 define('BASE_DIR',__DIR__);

 function generateSlug($str){
  $str = mb_strtolower($str);
  $str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
  $str = preg_replace('/( )/', '+',$str);
  $str = preg_replace('/(-[-]{1,})/','-',$str);
  $str = preg_replace('/(,)/','-',$str);
  $str=strtolower($str);
  return $str;
}

?>
