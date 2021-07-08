<!-- Slider -->
<div id="carouselTop" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselTop" data-slide-to="0" class="active"></li>
    <li data-target="#carouselTop" data-slide-to="1"></li>
    <li data-target="#carouselTop" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

        <?php 
        $i = 0;  
        foreach(getSlider('primary_top') as $s){ if($i == 0){
        ?>
        <div class="carousel-item active">
          <img src="<?php echo $s['image']; ?>" class="d-block w-100" alt="<?php echo $s['title']; ?>">
        </div>
        <?php $i++;   } else{ if($i != 0){ ?>
        <div class="carousel-item">
          <img src="<?php echo $s['image']; ?>" class="d-block w-100" alt="<?php echo $s['title']; ?>">
        </div>
        <?php } $i++;
        }  
          }
        ?>
  </div>
  <a class="carousel-control-prev" href="#carouselTop" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Atras</span>
  </a>
  <a class="carousel-control-next" href="#carouselTop" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
<!-- //Slider -->