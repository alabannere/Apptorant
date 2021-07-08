<?php  
  session_start();
  include '../config-site.php';
  include "../inc/functions.php"; 
?>
<?php 
  foreach(getClients() as $r){
?>
<a data-filter-item data-filter-name="<?php echo strtolower($r['name']); ?>" class=" bg-t order_box animated fadeIn shadow-sm" >
<figure class="card hover border-0 bg-t pl-3 pr-1">

<div class="row ">
  <div class="col  p-1 text-center text-white">
    <div class="text-left">
        <div class="p-2 text-white">
          <i class="fa fa-user"></i> <small><?php echo $r['name'] ?></small><br>
          <i class="fa fa-home"></i> <small><?php echo $r['address'] ?></small> <span class="ml-2 mr-2"> | </span>
          <i class="fa fa-phone"></i> <small><?php echo $r['phone'] ?></small>
        </div>    
    </div>

  </div>  
 
   <div class="col-2 text-right pt-3 pr-3">

        <button class="btn btn-sm btn-danger p-2" onclick="edit(<?php echo $r['ID'] ?>, '<?php echo $r['name'] ?>', '<?php echo $r['phone'] ?>', '<?php echo $r['address'] ?>', '<?php echo $r['email'] ?>')">
          <small><i class="fa fa-edit"></i></small>
        </button>  

        <button class="btn btn-sm btn-danger p-2" onclick="del(<?php echo $r['ID'] ?>)">
          <small><i class="fa fa-trash"></i></small>
        </button>  
   </div> 


</div>

</figure>
</a> <!-- col // -->      
<?php 
  }
?>


<script>
/////////////////////////////////////////

$(document).ready(function() {
  $(".hover").hover(
  function() {
    $(this).addClass('shadow-lg').css('cursor', 'pointer'); 
  }, function() {
    $(this).removeClass('shadow-lg');
  }
  );
});
/////////////////////////////////////////

</script>