<div class="row">
<?php 
    foreach(getHomeDestacados() as $r){
 ?>
<div class="col-md-3">
  <figure class="card card-product">
    <div class="img-wrap">
      <img src="<?php echo $r['sale_image_1'] ?>">
    </div>
    <figcaption class="info-wrap">
      <small class="price-old"><del>$<?php echo $r['sale_min_price'] ?></del> </small>
        <h4 class="title">$<?php echo $r['sale_price'] ?></h4>
        <p class="desc"><?php echo $r['sale_title'] ?></p>
        <div class="rating-wrap">
          <div class="label-rating">132 reviews</div>
          <div class="label-rating">154 orders </div>
        </div> <!-- rating-wrap.// -->
    </figcaption>
    <div class="bottom-wrap">
      <a href="./<?php echo $r['sale_link'] ?>/<?php echo url_parser($r['sale_title']) ?>/<?php echo $r['ID'] ?>/" class="btn btn-sm btn-warning float-right">Ver mas</a> 
      <div class="price-wrap h5">
        <span class="price-new">$<?php echo $r['sale_price'] ?></span> <del class="price-old">$<?php echo $r['sale_min_price'] ?></del>
      </div> <!-- price-wrap.// -->
    </div> <!-- bottom-wrap.// -->
  </figure>
</div> <!-- col // -->      
<?php 
    }
 ?>
</div> <!-- row.// -->
