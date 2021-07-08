<?php
  session_start(); 
  include "./inc/functions.php"; 
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_GET['error'] ?></title>
    <meta name="description" content="<?php echo options('description') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo options('keywords') ?>" />
    <meta name="robots" content="<?php echo options('robots') ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo options('favicon') ?>">
    <?php echo mod('header_links'); ?>
  </head>
<body>
<?php mod('nav'); ?>

<div class="container p-5">

<div class="card">


    <div id="tab1">
      <div class="card-header text-center">
        <h4 class="title"><?php echo $_GET['error'] ?></h4>
      </div>


      <div class="card-body text-center">

        <button class="btn btn-light btn-sm" onclick="goBack()" >Volver</button>

      </div>



</div>


</div>
</div>

<?php mod('footer'); ?>
