<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Apptorant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="">
    <?php mod('header_links'); ?>

  </head>
<body class="bg-s">
<?php mod('nav'); ?>



<div id="page"></div>


<!-- GENERAL INCLUDES-->
<div class="modal spinner" style="z-index:99999999"><!-- SPINNER --></div>
<div id="snackbar" class="bg-success" style="z-index:999999999"></div>
<script type="text/javascript" src="app.js?v=2"></script>


<?php mod('footer'); ?>
<!-- GENERAL INCLUDES-->

<script type="text/javascript">
  page('_createorder');

  function page(page){
    spin(true);
    $.ajax({
      url:"./"+page+".php",
      datatype:"html",
      success:function(data){
        spin(false);
        $('#page').html(data);
        
      }
    }); 
  }
</script>



