<?php
  ob_start(); 
  session_start();


  foreach(glob('classes/*.class.php') as $file) {
    require_once($file);
  }

  function my_autoload($class) {
    if(preg_match('/\A\w+\Z/', $class)) {
      include('classes/' . $class . '.class.php');
    }
  }
  spl_autoload_register('my_autoload');
