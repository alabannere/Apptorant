<?php  
  session_start();
  include '../config-site.php';
  include "../inc/functions.php"; 
?>
<?php 
  foreach(getUsers() as $r){
?>
<a data-filter-item data-filter-name="<?php echo strtolower($r['name']); ?>" class=" bg-t order_box animated fadeIn shadow-sm" >
<figure class="card hover border-0 bg-t pl-3 pr-1">

<div class="row ">
  <div class="col  p-1 text-center text-white hover">
    <div class=" text-left">
        <div class="btn btn-sm btn-c p-2 text-white">
          <i class="fa fa-user"></i> <small><?php echo $r['user_name'] ?></small>
        </div>     
    </div>

  </div>  
   
   <div class="col text-right pt-1">

        <button class="btn btn-sm btn-danger p-2" onclick="editUser(<?php echo $r['ID'] ?>, '<?php echo $r['user_name'] ?>', '<?php echo $r['user_code'] ?>')">
          <small><i class="fa fa-edit"></i></small>
        </button>  

        <?php if($r['user_type'] === 'user'){ ?>
          <button class="btn btn-sm btn-danger p-2" onclick="deleteUser(<?php echo $r['ID'] ?>)">
            <small><i class="fa fa-trash"></i></small>
          </button>  
        <?php }?>
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