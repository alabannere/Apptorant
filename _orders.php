<?php  
  session_start();
  include './config-site.php';
  include "./inc/functions.php"; 
?>

<div class="animated fadeIn">

<nav class="navbar navbar-light shadow bg-p">
  <div class="row ml-1 animated fadeIn">

        <a class="product_box hover m-0 mr-2" onclick="page('_createorder')">
          <button class="btn btn-dark bg-t btn-block text-white border-0">
            <i class="fa fa-chevron-left"></i>
          </button>
        </a> <!-- col // -->   


        <a class="product_box hover m-0 mr-2" href="#">
          <button class="btn btn-danger btn-block text-white border-0" data-toggle="collapse" data-target="#sec_filter" aria-controls="sec_filter" aria-expanded="false">
            <i class="fa fa-search"></i>
          </button>
        </a> <!-- col // -->  


        <a class="hover m-0 ml-2" onclick="modalSelectUser()">
          <button class="btn btn-danger text-white border-0">
            <i class="fa fa-user mr-2"></i><small class="text-capitalize" id="user-name"></small>
          </button>
        </a> <!-- col // -->   

  </div> <!-- row.// -->


</nav>



<div class="row ">

<div class="col-6">


      <div class="row p-2 pt-3 bg-p mt-3 ml-3">


        <span class="text-white col-6 text-left  ">Sector A</span>
        <span class="text-white col-6 text-left bg-p">Sector B</span>

      <div class="col-6 bg-p">
<hr>
        <div class="row m-3">
        <?php 
        foreach(getTables('a') as $r){ 
          if($r['active']=== 'true' ){
            $active = "danger"; //Si esta ocupada agregar producto al pedido de esa mesa.
          }else{
            $active = "success";
          } 
        ?>
        <div class=" p-2 ">
              <button class="btn btn-lg btn-<?php echo $active; ?> pl-3 pr-3" onclick="selectTable('<?php echo $r['number']; ?>')" >
                <small> <?php echo $r['number']; ?> </small>
              </button>   
        </div>
        <?php  }?>
        </div>

      </div>

      <div class="col-6 bg-p">

<hr>
        
        <div class="row  m-3">

        <?php foreach(getTables('b') as $r){ 
          if($r['active']=== 'true' ){
            $active = "danger";
          }else{
            $active = "success";
          } 
        ?>
        <div class="p-2 ">
              <button class="btn btn-lg btn-<?php echo $active; ?>  pl-3 pr-3" onclick="selectTable('<?php echo $r['number']; ?>')" >
                <small> <?php echo $r['number']; ?> </small>
              </button>   
        </div>
        <?php  }?>
        </div>

      </div>
      </div>




      <hr>
          <small class="text-c p-2 pl-4 "> 
            <h6 class="badge bg-danger badge-lg text-danger mr-1">#</h6>  Ocupado 
            <h6 class="badge bg-success ml-4 text-success mr-1">#</h6>  Desocupado
          </small>

</div>

<div class="col-6 animated fadeInRight">

  <div class="collapse" id="sec_filter">
    <input id="filter" type="text" class="form-control w-50 ml-auto mr-auto mt-2" data-search>
  </div>  

  <div class="_scroll pl-4 pr-4 pt-2 bg-p">
       <div class=" pb-5" id="orders"><!-- ORDERS --></div> 
  </div>

</div>


</div>



</div>

<!-- GENERAL INCLUDES-->
<input type="hidden" id="date_amd">

<?php include './inc/home_modal_salon.php'; ?>
<?php include './inc/home_modal_salon.php'; ?>
<?php include './inc/home_modal_select_type.php'; ?>
<?php include './inc/home_modal_select_user.php'; ?>

<?php include './inc/home_modal_addorder.php'; ?>

<script type="text/javascript" src="app.js"></script>

<!-- GENERAL INCLUDES-->


<script>

initAll();
//el problema aca y si se pase de las 12 de la noche
orders($(date_amd).val());


setInterval(clockTick, 1000);


function orders(date){
  spin(true);
  $.ajax({
    type:"get",
    url:"./inc/orders_orders.php",
    data:"date="+date,
    datatype:"html",
    success:function(data){
      $('#orders').fadeIn(3000)
      $('#orders').html(data);
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

