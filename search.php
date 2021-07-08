<!-- head -->
<?php  
  session_start();
  include "./inc/functions.php"; 

  if (!isset($_GET['earch'])) {
  	header('Location: /');
  	return;
} else{

  $q = $_GET['earch'];


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $q ?> en <?php echo options('name'); ?></title>
    <meta name="description" content="<?php echo options('description') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo options('keywords') ?>" />
    <meta name="robots" content="<?php echo options('robots') ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo options('favicon') ?>">
    <?php echo mod('header_links'); ?>
  </head>
<body class="bg-light">
<?php mod('nav') ?>

<style type="text/css">
  
.image-horizontal-list img {
  object-fit: cover;
}

</style>

<div class="container pt-5">
<?php if(search($q)){?>  

<div class="row">

<div class="col-3 mb-2">
<div class="card bg-light p-2">
  sdsd
</div>

</div>


<div class="list-group col-9">
<?php foreach(search($q) as $r){?>  

	<a href="<?php echo urlFriendly('p', $r['sale_title'], $r['ID']) ?>" class="list-group-item p-0 card-product mb-2">
<div class="row">
          <div class="image-horizontal-list pull-left">
			         <img src="<?php echo $r['sale_image_1'] ?>" alt="..."   style="height: 150px; max-width: 150px; ">
          </div>

          <div class="p-3">
            <h5 class="text-dark font-weight-lighter"><?php echo $r['sale_title'] ?></h5>
            <h4 class="text-dark">$<?php echo $r['sale_price'] ?></h4>  
          </div>
</div>
	</a>

<?php }?>
</div>


</div>


<?php }else{?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center mt-5">
  <h1 class="display-4">Busqueda</h1>
  <p class="lead">Su busqueda no obtuvo ningun resultado para "<?php echo $q ?> "</p>
</div>
<?php }?>


</div>


<?php   
  }
?>
<!-- // head -->


<?php mod('footer') ?>

