<?php  
  session_start();
  include '../config-site.php';
  include "functions.php"; 
?>

<?php 

  if (isset($_GET['date'])) {
      $date = $_GET['date'];
  }
?>


<?php 
    foreach(getOrdersByDate($date) as $r){
?>
<a data-filter-item data-filter-name="<?php echo strtolower($r['name']); ?>" class="order_box animated fadeIn">
  <figure class="card hover border-0">

<div class="row">



    <div class="col bg-s p-1 text-center text-white hover">
      <div class=" text-left">

          <button class="btn btn-sm btn-c p-2 text-white" onclick="selectSalon()">
            <i class="fa fa-utensils"></i><br> <small><?php echo $r['type'] ?></small>
          </button>     

          <button class="btn btn-sm btn-danger p-2" onclick="selectSalon()">
            <small>Mesa</small><br> <small><?php echo $r['number_table'] ?></small>
          </button>  

      </div>

    </div>  
 
    <div class="col bg-s p-1 text-center text-white text-right">
        <small><?php echo $r['date'] ?></small>
    </div>      
     <div class="col bg-s shadow-sm pt-2 text-right">
        <h6 class="text-white ">$<?php echo $r['total'] ?></h6>
     </div> 


</div>

  </figure>
</a> <!-- col // -->      
<?php 
    }
?>


<script>

$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready  

$(".hover").hover(
  function() {
    $(this).addClass('shadow-lg').css('cursor', 'pointer'); 
  }, function() {
    $(this).removeClass('shadow-lg');
  }
);
  



// document ready  
});




</script>