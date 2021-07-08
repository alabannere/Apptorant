<?php 

  // CONECT BD

  define('DBHOST','190.228.29.62');
  define('DBUSER','apptorant');
  define('DBPASS','Apptorant877485');
  define('DBNAME','apptorant');

  $conn = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Error");
  mysqli_set_charset($conn,"utf8");

  // CONECT BD


  // URL  
  define('BASEURL',substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])) );





 ?>