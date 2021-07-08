<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>


<nav class="navbar navbar-light shadow bg-p">
  <div class="row ml-1">

    <a class="product_box hover animated fadeIn m-0 mr-2 ml-2" href="#">
      <button class="btn btn-danger btn-block text-white border-0" data-toggle="collapse" data-target="#sec_filter" aria-controls="sec_filter" aria-expanded="false">
        <i class="fa fa-search"></i>
      </button>
    </a> <!-- col // -->  



    <a class="product_box hover m-0" onclick="page('_orders')">
      <button class="btn btn-dark bg-t btn-block text-white border-0">
        <i class="fa fa-list-alt"></i>
      </button>
    </a> <!-- col // -->   


    <a class="hover m-0 ml-2" onclick="modalSelectUser()">
      <button class="btn btn-danger text-white border-0">
        <i class="fa fa-user mr-2"></i><small class="text-capitalize" id="user-name"></small>
      </button>
    </a> <!-- col // -->  



    <div style="width: 300px; position: absolute; right:0">
     <nav class="navbar navbar-light bg-s p-1 animated fadeInRight shadow">
        <button class="btn btn-transparent text-white" onclick="clearList()">
          <i class="fa fa-trash"></i> 
        </button>
        <span id="cart-title"></span>
        <span id="cart-title-right"></span>
      </nav>
    </div>


  </div> <!-- row.// -->





  </div> <!-- row.// -->





</nav>



<div class="row ">

<div class="col">

<!-- FILTER -->  
  <div class="collapse" id="sec_filter">
    <input id="filter" type="text" class="form-control w-50 ml-auto mr-auto mt-2" data-search>
  </div>  
<!-- FILTER // -->  



<!-- CATEGORIAS -->  
<div class="row p-2 pl-4">
     <a class="product_box hover animated fadeIn m-0 mr-2 ml-3" href="#">
      <button class="btn btn-dark bg-t btn-block text-white border-0" onclick="homeCategory('all')">
        <i class="fa fa-th-list"></i>
      </button>
    </a> <!-- col // -->  

    <?php 
        foreach(getCategories() as $r){
    ?>
    <a class="product_box hover animated fadeIn m-0 mr-2" href="#">
      <button class="btn btn-dark bg-t btn-block text-white border-0" onclick="homeCategory(<?php echo $r['ID'] ?>)">
        <i class="<?php echo $r['icon'] ?>"></i><small> <?php echo $r['name'] ?></small>
      </button>
    </a> <!-- col // -->      
    <?php 
        }
    ?>  
</div>
<!-- CATEGORIAS //-->  



  <div class="_scroll pl-4 pr-4 pt-2">
       <div class="row pb-5 " id="home_products"><!-- PRODUCTOS --></div> 
  </div>

</div>



<div class="full-height-right bg-t shadow animated fadeInRight pt-1">

    <div id="order" class=" text-white">
      <!-- CARRITO -->
    </div>


    <div class="panel_right-bottom bg-p pt-2 ">
      <div class="row pr-4 pl-4 pb-2" >
        <button class="btn btn-success  " onclick="addOrder()">
          <i class="fa fa-paper-plane"></i>
        </button>
        <div class="ml-auto">
            <span class="mt-2 text-white small ">TOTAL:</span><br>
            <h4 class="text-white "> $<span id="total"></span> </h4>  
        </div>
      </div>
    </div>

</div>


<div style=" width: 300px; height: 100px !important"><!-- FIX --></div>

</div>





<!-- GENERAL INCLUDES-->

<?php include './inc/home_modal_salon.php'; ?>
<?php include './inc/home_modal_salon.php'; ?>
<?php include './inc/home_modal_select_type.php'; ?>
<?php include './inc/home_modal_select_user.php'; ?>

<?php include './inc/home_modal_addorder.php'; ?>

<script type="text/javascript" src="app.js"></script>

<!-- GENERAL INCLUDES-->


<script>
getList();
initAll();
homeCategory('all');

setInterval(clockTick, 1000);

function homeCategory(cat){
  spin(true);
  $.ajax({
    type:"get",
    url:"./inc/home_products.php",
    data:"category="+cat,
    datatype:"html",
    success:function(data){
      $('#home_products').fadeIn(3000)

      $('#home_products').html(data);
      spin(false);
    }
  }); 
}
</script>

<script>
$('[data-search]').on('keyup', function() {
  var searchVal = $(this).val();
  var filterItems = $('[data-filter-item]');

  if ( searchVal != '' ) {
    filterItems.addClass('hidden');
      $('[data-filter-item][data-filter-name*="'+searchVal.toLowerCase()+'"]').removeClass('hidden');
  } else {
      filterItems.removeClass('hidden');
  }
});
</script>





